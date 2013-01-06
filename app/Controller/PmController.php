<?php

/**
 * PmController
 *      Private Message
 *      users can send or receive pm, we have 4 folder for any user
 *      this folders is :
 *          - inbox  : received pm holds in this
 *          - outbox : sent pm holds in this
 *          - draft  : saved pm holds in this
 *          - trash  : deleted pm holds in this 
 * 
 * @package Gilas
 * @author Hamid
 * @copyright 2013
 * @version $Id$
 * @access public
 */
class PmController extends AppController{
    
    
	public $uses = array('Message');
    
    public function add($msg_id = null){
	   $this->helpers[] = 'TinyMCE.TinyMCE';
       
       // fetch all users that this user can send message to it
	   $users = $this->Message->Recipients->Recipient->find('list', array(
           // 'conditions' => ($this->Auth->user('role_id') == $this->getRole('mosaferAdmin'))?null: array('Recipient.role_id' => $this->getRole('mosaferAdmin')),
            'fields' => array('Recipient.id','Recipient.name')
            )
        );
        $this->set('users',$users);
		if($this->request->is('post')){
		  // parent of new message is 0
          $this->request->data['parent_id'] = 0;
            // if user want save message
			if($this->request->data['save']){
			 // Save it
		     if($this->_save($this->request->data)){
		         $this->Session->setFlash('انجام شد','success');
		     }else{
		          $this->Session->setFlash('خطا','error');
                 return;
		     }
			}
            // if user want send message
			elseif($this->request->data['send']){
			 if($this->_send($this->request->data)){
		         $this->Session->setFlash('پیام ارسال گردید. ','success');
		     }else{
		          $this->Session->setFlash('خطا','error');
                 return;
		     }
			}
		}
        // Give message from url (Such give message from draft)
        if($msg_id){
            $msg = $this->Message->find('first',array(
                'conditions'=> array(
                    'Reader.user_id' => $this->Auth->user('id'),
                    'Reader.message_id' => $msg_id,
                )
            ));
            $this->set('message', $msg['Message']);
        }
    }

    public function beforeFilter(){
        // any user can access to downloading action
        $this->Auth->allow('*');
        parent::beforeFilter();
    }
    
    public function reply(){
        if($this->request->data){
            // Save message
            if(isset($this->request->data['save'])){
                // check not empty message
                if(! empty($this->request->data['message'])){
                    // Save it
                    $this->_save($this->request->data);
                    $this->Session->setFlash('پیام ذخیره شد');
                    $this->redirect($this->referer()); 
                }else{
                    // if empty message
                    $this->Session->setFlash('متن پیام نمی تواند خالی باشد','error');
                    $this->redirect($this->referer());   
                }
            }
            // Check User can access to this message id
            $message = $this->Message->find('first',array(
                'contain' => array('Reader', 'Sender','Recipients.Recipient'),
    			'conditions'=>array('Reader.user_id'=>$this->Auth->user('id'), 'Reader.message_id' =>  $this->request->data['id']),
                'order' => array('Message.created DESC'),
            ));
            // $this->request->data['id'] is id of primary message
            $this->request->data['parent_id'] = $this->request->data['id'];
            
            // if sender of primary message isn't this user so user reply to it
            if($message['Sender']['id'] != $this->Auth->user('id')){
                $this->request->data['Recipients'][0]  = $message['Sender']['id'];
            }else{
                // else if sender of primary message is this user
                // so search all reply for this message
                $sender = $this->Message->find('all',array(
                    'contain' => array('Reader', 'Sender'),
        			'conditions'=>array('Reader.user_id'=>$this->Auth->user('id'), 'Message.parent_id' =>  $this->request->data['id']),
                    'order' => array('Message.created DESC'),
                ));
                //if message has reply
                if($sender){
                // for each reply check if  user id of reply not equal this user then send reply to it
                foreach($sender as  $sen){
                    if($sen['Sender']['id'] != $this->Auth->user('id')){
                        $this->request->data['Recipients'][0]  = $sen['Sender']['id'];
                        break;
                    }
                }
                // if no recipient detected, give recipient of primary message
                if(empty($this->request->data['Recipients'][0])){
                    $this->request->data['Recipients'][0]  = $message['Recipients'][0]['Recipient']['id'];
                }
                }else{
                    // else if message hasn't reply
                    // give recipient of primary message
                    $this->request->data['Recipients'][0]  = $message['Recipients'][0]['Recipient']['id'];
                }
                //TODO: it possible user send message then reply it 
                // then we must give recipient of primary message
                // it can one or more recipient if has one so send to it else show list of recipient that user 
                // select one or more  
            }
            
            //TODO: check if user remove message and user receive one reply for this message or user send reply
            // What do we do??
            // State 1: User reply message
            //      Description: When user send reply he want see it in outbox and show in reciever column name of reciepent that is who that user reply to it
            //                   and he want see it in inbox because the previuse reply received must be placed in inbox
            //      Possible Answers: 
            //          Answer 1: (1) if User delete message he can't reply it,
            //                    (2) if User trashed it when reply it message must be move to outbox,
            //                    (3) if message is in inbox and user reply it message must be in inbox and outbox  
            // remove id because we won't change id
            unset($this->request->data['id']);
            
            // change subject of reply 
            //TODO: user can change subject of message , create this in read action
            /** $this->request->data['subject']  = 'پاسخ - '. $message['Message']['subject']; */
            
            // send message
            if($this->_send($this->request->data)){
                
             $this->Session->setFlash('پیام ارسال گردید');
             $this->redirect($this->referer());   
            }
        }
        //TODO: change it redirect to referer or send error 404
        $this->autoRender = false;
    }
    // Step 1: first get all message that it is in inbox message and reply (both)
    // Step 2: then remove all message id that is in parent_id of this list
    // Step 3: then unique all parent_id that is not zero and keep last parent_id
    // Step 4: now search in PmMessageUser that rows have this message_id
    // Step 5: show Sender primary message for reply messages but all other data is for reply
    // IMPORTANT User can see message that no deleted
    // TODO: check above comment in this code
    public function _messageId($folder){
        // Step 1
       $messages = $this->Message->find('all',array(
            'contain' => 'Reader',
            'fields' =>  array('Message.id','Message.parent_id','Reader.new'),
            'conditions'=>array(
                'Reader.user_id'=>$this->Auth->user('id'), 
                'Reader.folder' => $folder,
                //TODO: all search condition come here
                //'Message.message LIKE' =>"%دو%",
            ),
       ));
       // Step 2
            // set array(message_id => parent_id)
       $message_ids = Set::combine($messages, '{n}.Message.id', '{n}.Message.parent_id');
       
       $message_new = Set::combine($messages, '{n}.Message.id', '{n}.Reader.new');
       $parents = array();
            //remove all message id that has reply
       foreach($message_ids as $key => $msg){
        // check parent id isn't 0, if hasn't 0 it is reply
        if($msg){
            
            // if primary message is't in this folder so we won't show this reply
            if(! isset($message_ids[$msg])){
                // when first reply reachedd in loop parent of it removed
                // so when second reply of it reached we can't understand parent of it removed or is in other folder
                // we must keep it in array then if parent is in array  
                //if(in_array($msg,$parents)); continue;
                // if reply isn't new
                $parent_folder = $this->Message->Reader->find('first',array('conditions' => array('Reader.user_id'=>$this->Auth->user('id'),'Reader.message_id' => $msg)));
                if($message_new[$key] != 1){
                    // fetch folder of parent message
                    // if 
                    if($parent_folder['Reader']['folder'] == $this->folder['delete'] || 
                       $parent_folder['Reader']['folder'] == $this->folder['trash']){
                        //remove reply
                        unset($message_ids[$key]);
                    }
                }else{
                    // if has new reply move parent to inbox if 
                    if($parent_folder['Reader']['folder'] == $this->folder['delete'] || 
                       $parent_folder['Reader']['folder'] == $this->folder['trash']){
                    $this->Message->Reader->id = $parent_folder['Reader']['id'];
                    $this->Message->Reader->save(array('folder' => $this->folder['inbox']));
                    }
                }
            }else{
                
                $parents[] = $msg;
            //remove parent of reply
            unset($message_ids[$msg]);
            }
        }
       }
       foreach($message_ids as $key => $msg){
        // check parent id isn't 0, if hasn't 0 it is reply
            if($msg){
           // remove all reply of message and keep last of it
                foreach($message_ids as $k => $m){
                    if($k < $key){
                        if($msg == $m){
                            unset($message_ids[$k]);
                        }
                    }else{
                        break;
                    }
                }
           }
       }
       // return all message id that must show in list
       return array_keys($message_ids);
    }
    
    protected function _getList($folder,$params = array()){
        $this->helpers[] = 'AdminForm';
        $contain = array('Reader', 'Sender',);
        if($folder == $this->folder['outbox']){
            $contain[] = 'Recipients.Recipient';
        }
        $this->paginate['Message'] = array(
            'contain' => $contain,
			'conditions'=>array(
                'Reader.user_id'=>$this->Auth->user('id'), 
                'Reader.folder' => $folder,
                //fetch all message id that return this public function
                'Reader.message_id' => $this->_messageId($folder),
            ),
            'order' => array('Message.created DESC'),
       );
       
       $message = $this->paginate('Message');

      // in this code we want get count of reply for any message
      // then show primary sender instead of reply sender, all other data keep
      //TODO: check it is necessary show primary sender or no
      // IMPORTANT: above described  has not been implemented 
      // if user receive message
       if($message){
        
        foreach($message as $key => $msg){
            // this keep id of primary message
            $msg_id = $msg['Message']['id'];
            // if message is reply 
            if(!empty($msg['Message']['parent_id'])){
                $msg_id = $msg['Message']['parent_id'];
            }
            // give count of reply for this message id
            $reply = $this->Message->find('count',array('conditions'=>array(
                'Reader.user_id'=> $this->Auth->user('id'), 
                'Message.parent_id' => $msg_id,
            )));
            // if message has reply 
            if($reply){
                // reply + primary message
                $reply ++;
                // append count to message array
                $message[$key]['reply_count'] = $reply;
            }
        }
       }
       return $message;
    }
    // Inbox of user
	public function inbox()
	{
	   $this->set('filter',array());
	   $this->set('messages', $this->_getList($this->folder['inbox']));
	}

    // Trash of message
    // This action show all message that keep in trash
    // when user delete message it move to trash and keep it
    public function trash(){
        $this->set('filter',array());
	    $this->set('messages', $this->_getList($this->folder['trash']));
    }
    
    // delete message
    // when user delete message this action running
	public function delete($id = null){
	   // id can give from URL or GET param
	   if(empty($id)){
	       $id = (isset($this->request['url']['id']))?$this->request['url']['id']:null;
	   }
       //TODO: again checking!!
       if(empty($id)){
        return false;
       }
       
       // Deleting message
       return $this->_delete($id);
	}
    
    // this public function delete message
    public function _delete($id){
        // Check User can access to this message id
        $message = $this->Message->Reader->find('first', array(
				'conditions'=>array('Reader.user_id'=>$this->Auth->user('id'),'Reader.id' => $id),
		));
        
        if(! $message){
            return false;
        }
        if($message['Message']['parent_id'] != 0){
            $message = $this->Message->Reader->find('first', array(
				'conditions'=>array('Reader.user_id'=>$this->Auth->user('id'),'Reader.message_id' => $message['Message']['parent_id']),
    		));
        }
        
        // Send message to trash
        $folder = 'trash';
        
        // if message is in trash delete it
        if($message['Reader']['folder'] == $this->folder['trash']){
            $folder = 'delete';
        }
        $this->Message->Reader->id = $message['Reader']['id'];
        if($this->Message->Reader->save(array('folder' => $this->folder[$folder]))){
            $this->Session->setFlash(count($id) . ' پیام حذف گردید.','success');
            $this->autoRender = false;
        
            // if request is ajax redirect to referer of given url
            //TODO: What is it?
            $url = $this->referer();
            
            if($this->RequestHandler->isAjax()){
                return true;
                /** $url = $this->request['named']['ref']; */
            }
            $this->redirect($url);
        }
        return false;
    }
    // download attachment for this message id
    public function download($id = null){
        // check user can access to this message id
        $conditions = array(
                'Reader.user_id' => $this->Auth->user('id'),
                'Reader.id' => $id,
                'Reader.folder NOT' => $this->folder['delete'],
            );
        $message = $this->Message->find('first',array(
            'conditions' => $conditions,
        ));
        
        // if user can't access or message has no attachments
        // redirect it to referer
        if(empty($message['Message']['files'])){
            $this->Session->setFlash('فایل یافت نشد','error');
            $this->redirect($this->referer());
        }
        
        $file = unserialize($message['Message']['files']);
        // call parent method that do downloading action
        parent::download(array_merge($file, array('folder' => 'pm')));
    }
    // $id is id of MessageUser Model
	public function read($id = null)
	{
	   // This used when we want get message from msg_id See:http://localhost/documents/posts/view/47
       if(isset($this->passedArgs['msg_id'])){
            $message = $this->Message->find('first',array(
                'conditions' => array(
                    'Reader.user_id' => $this->Auth->user('id'),
                    'Reader.message_id' => $this->passedArgs['msg_id'],
                    'Reader.folder NOT' => $this->folder['delete'],
                ),
                'contain' => array('Sender','Reader')
            ));
            if($message){
                $id = $message['Reader']['id'];
            }
       }

       if(is_null($id)){
            $this->Session->setFlash('اشکال در مشاهده پیام','error');
            $this->redirect($this->referer());
       }
	   // Call this when user directly read message
       // this public function get all message can user see and move message when it receive new reply
	   $this->_messageId($this->folder['inbox']);
       
	   // fetch all users that this user can send message to it
	   $users = $this->Message->Recipients->Recipient->find('list', array(
            'conditions' => ($this->Auth->user('role_id') == $this->getRole('mosaferAdmin'))?null: array('Recipient.role_id' => $this->getRole('mosaferAdmin')),
            'fields' => array('Recipient.id','Recipient.name')
            )
        );
	   $this->set('users',$users);
       
	   $this->helpers[] = 'Tinymce';
       
       // check user can access to this message id
	   $conditions = array(
                'Reader.user_id' => $this->Auth->user('id'),
                'Reader.id' => $id,
                'Reader.folder NOT' => $this->folder['delete'],
            );
		$message = $this->Message->find('first',array(
            'conditions' => $conditions,
            'contain' => array('Sender','Reader','Recipients.Recipient')
        ));

        // this variable used for breadcrump
        $this->set('ref_action', @$this->folder[$message['Reader']['folder']]);
        
        // if user can't access or message no available
        if(empty($message)){
            $this->set('message', array());
            return;
        }else{
            // if this message is parimary message get any conversation for it
            if($message['Message']['parent_id'] == 0){
                $this->_getConversation($message);
            }else{
                // if is new reply move parent to inbox
                $is_new = $message['Reader']['new'];
                // if this message is reply , fetch primary message
        		$message = $this->Message->find('first',array(
                    'conditions' => array(
                        'Message.id' => $message['Message']['parent_id'],
                        
                    ),
                    'contain' => array('Sender','Reader','Recipients.Recipient')
                ));
                // if has new reply move parent to inbox if 
                if($message['Reader']['folder'] == $this->folder['delete'] || 
                   $message['Reader']['folder'] == $this->folder['trash']){
                $this->Message->Reader->id = $message['Reader']['id'];
                $this->Message->Reader->save(array('folder' => $this->folder['inbox']));
                }
                // fetch any conversation for it
                $this->_getConversation($message);
            }
            
        }    
        $this->set('message', $message);
        
        // Update read_date, new columns for any message and reply
        //TODO: this action can't update all message and reply and update just new column
        $updates = array('Reader.new' => 0);
        if(empty($message['Reader']['read_date'])){
            $updates['Reader.read_date'] = $this->Jalali->date('"Y-m-d H:i:s"');
        }
		$this->Message->Reader->updateAll($updates, $conditions);
	}

    // Get conversation for this message
	protected function _getConversation(&$message, $field = 'Conversation'){
	   
	   // find all reply that this use can access to it
	   $message[$field] = $this->Message->find('all',array(
            'conditions' => array(
                'Message.parent_id' => $message['Message']['id'],
                'Reader.user_id' => $this->Auth->user('id'),
            ),
            'contain'=> array('Sender','Reader','Recipients.Recipient'),
        ));
        
        // keep all reply id this used for updating read_date and new column
        $msg_ids = array();
        if($message[$field]){
            
            foreach($message[$field] as $key => $conversation){
                if(in_array($conversation['Message']['id'],$msg_ids)){
                    // remove dublicate conversation
                    // this happen when user reply to more than one users
                    unset($message[$field]['$key']);
                }else{
                $msg_ids[] = $conversation['Message']['id'];
                }
            }
            $updates = array('Reader.new' => 0);
            if(empty($message['Reader']['read_date'])){
                $updates['Reader.read_date'] = $this->Jalali->date('"Y-m-d H:i:s"');
            }
            $conditions = array(
                'Reader.message_id' => $msg_ids,
                'Reader.user_id' => $this->Auth->user('id'),
            );
            $this->Message->Reader->updateAll($updates, $conditions);
        
        }
        
        // Just sender can see recipients of primary message
        if($message['Sender']['id'] != $this->Auth->user('id')){
            unset($message['Recipients']);
        }
	}
    
    // Outbox of message
    // This action show all message that user sent
    //TODO: this action isn't complete must create this like inbox
	public function outbox()
	{
	   $this->set('filter',array());
	   $this->set('messages', $this->_getList($this->folder['outbox']));
	}

    // Draft of message
    // This action show all message that user save
    //TODO: this action isn't complete must create this like inbox
	public function drafts()
	{
	   $this->set('filter',array());
	   $this->set('messages', $this->_getList($this->folder['draft']));
	}
    
    // check attachment can upload
    // params: $uploaded :  file parameters array that include $_FILES parameters 
    public function _checkUpload($uploaded){
        // Max size : 1M
        $max_size = 8 * 1024 * 1024;
        // file type can upload
        $valid_type = array(
            "application/zip", 
            "application/rar", 
            "application/pdf",
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            'application/msword',
            "image/jpeg", 
            "image/gif", 
            "image/png",
        );
        
        // if no file attachment or no file uploaded
        if(empty($uploaded) || empty($uploaded['type'])){
            return true;
        }
        // check all conditions
        if($uploaded['error'] == 0){
            if($uploaded['size']< $max_size){
                if(in_array($uploaded['type'],$valid_type)){
                    return true;
                }
            }
        }
        // after above checking if has error return false
        return false;
    }
    
    // Upload attachment 
    // params : $uploaded $_FILES array
    //          $id: id of message 
    public function _upload($uploaded,$id){
        // Path is /app/download/pm/
        $path = APP.'download'.DS.'pm'.DS ;
        // get extension of file
        $ext = explode('.',$uploaded['name']);
        $ext = end($ext);
        
        // change file name to $id.$ext all file save with message id
        //IMPORTANT: if user can send multiple attachment this file naming have error
        //           because all attachments overwrite and latest attachment is keep
        $file_name = $id . '.' . $ext;
        
        // after move file return file name
        if(move_uploaded_file($uploaded['tmp_name'],$path.$file_name)){
            return $file_name;
        }
        // else if moving has error
        return false;
    }

	/**
	 * Save pm as draft
	 * 
	 * @param array $params : params of pm
     *           subject : Subject of pm
     *           message : Message of pm
     *           
	 * @return
	 */
	public function _save($params = array()){
	   
	   // create data
	   $data['Message']['user_id'] = $data['Reader']['user_id'] = $this->Auth->user('id');
       $data['Message']['subject'] = (isset($params['subject'])?$params['subject']:'بدون موضوع');
       $data['Message']['message'] = $params['message'];
       $data['Message']['parent_id'] = 0; 
       $data['Reader']['read_date'] = 0;
       $data['Reader']['new'] = 0;
       // Save message as draft for User
       $data['Reader']['folder'] = $this->folder['draft'];
       
       // check uploading
       if($this->_checkUpload($params['file'])){
            
            $data['Message']['created'] = $this->Jalali->date('Y-m-d H:i:s'); 
            //Save message, saver
            $this->Message->saveAll($data);
            // Upload attachment
            $file_name = $this->_upload($params['file'],$this->Message->id);
            
            // if attachment uploaded
            if($file_name){
                // Save information of this attachment (filename in server, filename that must show to user)
                $file['name'] = $params['file']['name'];
                $file['file'] = $file_name;
                //update 
                $this->Message->save(array('files' => serialize($file)));
            }
       }
       //TODO: this public function return true in any conditions
       return $this->Message->id;
	}
    public function _send($params = array()){

        // create data
       $data['Message']['user_id'] = $data['Reader']['user_id'] = $this->Auth->user('id');
       $data['Message']['subject'] = $params['subject'];
       $data['Message']['message'] = $params['message'];
       $data['Message']['parent_id'] = (isset($params['parent_id']))?$params['parent_id']:0; 
       $data['Reader']['read_date'] = 0;
       $data['Reader']['new'] = 0;
       
       // Save message as outbox for User
       $data['Reader']['folder'] = $this->folder['outbox'];
       
       // get data of recipients
       $i = 0;
       $recipients = array();
       foreach($params['Recipients'] as $recipient){
            $recipients[$i]['user_id'] = $recipient;
            $recipients[$i]['read_date'] = 0;
            $recipients[$i]['new'] = 1;
            $recipients[$i]['folder'] = $this->folder['inbox'];
            $i++;
       }
       
       // check uploading
       if($this->_checkUpload($params['file'])){
        
            $data['Message']['created'] = Jalali::dateTime(); 
            //Save message, sender data
            $this->Message->saveAll($data);
            //Save recipients data
            foreach($recipients as $r){
                $this->Message->Recipients->create();
                $r['message_id'] = $this->Message->id;
                $this->Message->Recipients->save($r);
            }
            
            // Upload attachment
            $file_name = $this->_upload($params['file'],$this->Message->id);
            
            // if attachment uploaded
            if($file_name){
                // Save information of this attachment (filename in server, filename that must show to user)
                $file['name'] = $params['file']['name'];
                $file['file'] = $file_name;
                //update 
                $this->Message->save(array('files' => serialize($file)));
            }
       }
       // return id for success saving otherwise return false
       return $this->Message->id;
    }
    public function mosaferAdmin_newMessage($msg_id = null){
         $this->helpers[] = 'Tinymce';
        $users = $this->Message->Recipients->Recipient->find('list', array(
            'fields' => array('Recipient.id','Recipient.name'),
            'conditions' => (isset($this->passedArgs['uid']))?array('Recipient.id' => $this->passedArgs['uid']):null,
            )
        );
        $this->set('users',$users);
        if($this->request->data){
            $this->setAction('newMessage',$msg_id);
        }else{
            // Give message from url (Such give message from draft)
            if($msg_id){
                $msg = $this->Message->find('first',array(
                    'conditions'=> array(
                        'Reader.user_id' => $this->Auth->user('id'),
                        'Reader.message_id' => $msg_id,
                    )
                ));
                $this->set('message', $msg['Message']);
            }
            $this->render('newMessage');
        }
        
    }
    
    // Create message
    //params: $msg_id this parameter used when user want send saved message and want all data of it show in this action
	public function newMessage($msg_id = null)
	{
	   $this->helpers[] = 'TinyMCE.TinyMCE';
       // fetch all users that this user can send message to it
	   $users = $this->Message->Recipients->Recipient->find('list', array(
           // 'conditions' => ($this->Auth->user('role_id') == $this->getRole('mosaferAdmin'))?null: array('Recipient.role_id' => $this->getRole('mosaferAdmin')),
            'fields' => array('Recipient.id','Recipient.name')
            )
        );
        $this->set('users',$users);
		if(isset($this->request->data))
		{
		  // parent of new message is 0
          $this->request->data['parent_id'] = 0;
            
            // if user want save message
			if(isset($this->request['form']['save']) || isset($this->request->data['save']))
			{
			 // check message body can't be empty
			 if(empty($this->request->data['message'])){
    	         $this->Session->setFlash('متن پیام نمی تواند خالی باشد','error');
                 return;
    	     }
                // Save it
			     if($this->_save($this->request->data)){
			         $this->Session->setFlash('انجام شد','success');
			     };
			}
            // if user want send message
			elseif(isset($this->request['form']['send']) || isset($this->request->data['send']))
			{
			 // Checking
			 if(empty($this->request->data['subject']) || 
                empty($this->request->data['message']) ||
                empty($this->request->data['Recipients'])
            ){
    	         $this->Session->setFlash(array('عنوان درج شود','متن پیام نمی تواند خالی باشد','گیرنده پیام مشخص نشده است'),'error');
                 return;
    	     }
             
             // Send it
             $status = $this->_send($this->request->data);
             if($status){
		         $this->Session->setFlash('پیام ارسال گردید. ','success');
                 $this->redirect(array('action' => 'outbox'));
		     }
			}
		}
        // Give message from url (Such give message from draft)
        if($msg_id){
            $msg = $this->Message->find('first',array(
                'conditions'=> array(
                    'Reader.user_id' => $this->Auth->user('id'),
                    'Reader.message_id' => $msg_id,
                )
            ));
            $this->set('message', $msg['Message']);
        }
	}
    
    // return count of new message 
    // this function is used in beforeRender method in app_controller
    public function _countNewMessages(){
        return $this->Message->countNewMessages($this->Auth->user('id'));
    }
    
    // fetch 5 lates new messages for User
    // this function is used in beforeRender method in app_controller 
    public function _getRecently(){
        return $this->Message->find('all', array(
            'contain' => array('Reader', 'Sender'),
			'conditions'=>array('Reader.user_id'=>$this->Auth->user('id'),'Reader.new' => 1 ,'Reader.folder' => $this->folder['inbox']),
            'order' => array('Message.created DESC'),
            'limit' => 5
       ));
    }
}