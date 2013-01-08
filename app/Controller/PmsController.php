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
class PmsController extends AppController{
    
    
	public $uses = array('Message');
    
    public $paginateConditions = array(
        'folder' => array(
            'field' => 'Reader.folder',
            'default' => 1,
        ),
        'content' => array(
            'field' => array(
                'Message.subject',
                'Message.message',
            ),
            'type' => 'LIKE',
        ),
    );
    
/**
 * Get recipients for sending message
 * 
 * @return array of users format : user_id => user_name
 */
    protected function _getRecipients($conditions = array()){
	   $users = $this->Message->Recipients->Recipient->find('list', array(
            'conditions' => $conditions,
            'fields' => array('Recipient.id','Recipient.name')
            )
        );
        
        // remove owner
        unset($users[$this->Auth->user('id')]);
        return $users;
    }
    
/**
 * Read message if user can read it 
 * 
 * @param mixed $msg_id
 * @return
 */
    protected function _readMessage($msg_id){
        return $this->Message->find('first',array(
                'conditions'=> array(
                    'Reader.user_id' => $this->Auth->user('id'),
                    'Reader.message_id' => $msg_id,
                )
            ));
    }

/**
 * Read message if user can read it 
 * 
 * @param mixed $reader_id
 * @return
 */
    protected function _readMessageByReaderID($reader_id){
        $method = 'first';
        if(is_array($reader_id)){
            $method = 'all';
        }
        $reader = $this->Message->Reader->find($method,array(
                'conditions'=> array(
                    'Reader.user_id' => $this->Auth->user('id'),
                    'Reader.id' => $reader_id,
                ),
                'contain' => array('Message.Sender.SenderInfo','Message.Recipients.Recipient', )
            ));
        if($reader){
            switch($method){
                case 'first':
                    $reader = $this->_removeOtherRecipients($reader);
                break;
                default:
                    foreach($reader as &$re){
                        $re = $this->_removeOtherRecipients($re);    
                    }
                break;
            }
        }
        return $reader;
    }
/**
 * if reader is not sender , so we must don't show other recipients
 * 
 * @param array $message , 
 *          full info of message such as sender, reader, recipient
 *          Structure of array becomes from PmsController::_readMessageByReaderID
 * @return array $message , but removed other recipients
 */
    protected function _removeOtherRecipients($message){
        if($message['Message']['Sender']['SenderInfo']['id'] != $message['Reader']['user_id']){
            
            foreach($message['Message']['Recipients'] as $key => $recipient){
                
                if($recipient['user_id'] != $message['Reader']['user_id']){
                    unset($message['Message']['Recipients'][$key]);
                }
            }
        }
        return $message;
    }
    
/**
 * Create new message
 * 
 * @param mixed $msg_id, id of message that we must get message from it, such as draft
 * @return
 */
    public function admin_add($msg_id = null){
	   $this->helpers[] = 'TinyMCE.TinyMCE';
       
        $this->set('users',$this->_getRecipients());
        
		if($this->request->is('post')){
		  // parent of new message is 0
          $this->request->data['Message']['parent_id'] = 0;
            // if user want save message
			if($this->request->data['Message']['method'] == 'save'){
    			 // Save it
    		     if($this->_save($this->request->data['Message'])){
    		         $this->Session->setFlash('پیام با موفقیت ذخیره شد.', 'message', array('type' => 'success'));
                     $this->redirect(array('action' => 'index', 'folder' => $this->Message->folders['draft']));
    		     }else{
    		          $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
                     return;
    		     }
			}else{// if user want send message
    			 if($this->_send($this->request->data['Message'])){
                    $this->Session->setFlash('پیام با موفقیت ارسال گردید.', 'message', array('type' => 'success'));
                    $this->redirect(array('action' => 'index', 'folder' => $this->Message->folders['outbox']));
    		     }else{
    		          $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
                     return;
    		     }
			}
		}elseif($msg_id){ // Give message from url (Such give message from draft)
            $msg = $this->_readMessage($msg_id);
            $this->request->data['message'] = $msg['Message'];
        }
        $this->render('add');
    }

/**
 * List of messages for current user
 * 
 * @return void
 */
    public function admin_index() {
        $this->set('title_for_layout', 'لیست پیام ها');
        // Only message for current user must be listed
        $this->paginate['contain'] = array( 'Message.Sender.SenderInfo', 'Message.Recipients.Recipient');
        $this->paginate['conditions']['Reader.user_id'] = $this->Auth->user('id');
        $this->paginate['conditions']['Reader.parent_id'] = 0;
        $this->paginate['order'] = 'Message.created DESC';
        $pms = $this->paginate('Reader');
        if($pms){
            foreach($pms as &$pm){
                $pm['Message'] = $this->_lastConversation($pm);
                $pm['Message']['childCount'] = $this->_countConversation($pm['Reader']['id']);
                
            }
        }
        $selectedFolder = $this->Message->folders[$this->request->named['folder']];
        // add this helper for using FilterHelper in Filter Form
        $this->helpers[] = 'AdminForm';
        $this->set(compact('pms', 'selectedFolder'));
        $this->render('index');
    }
    
/**
 * Return count of conversations for current reader, 
 * 
 * @param mixed $parentReader_id, give Reader.id, this id must be parent
 * @return
 */
    protected function _countConversation($parentReader_id){
        return $this->Message->Reader->childCount($parentReader_id) + 1;
    }
    
/**
 * Return last message for current message
 * 
 * @param mixed $parent, Parent Message that must be has Reader array in it
 * @return array message, Only return Message array
 */
    protected function _lastConversation($parent){
        $reader = $this->Message->Reader->find('first', array(
            'contain' => array( 'Message.Sender.SenderInfo', 'Message.Recipients.Recipient'),
            'conditions' => array(
                'Reader.parent_id' => $parent['Reader']['id'],
                'Reader.rght' => $parent['Reader']['rght'] - 1,
            ), 
        ));
        if($reader){
            return $reader['Message'];    
        }
        return $parent['Message'];
    }
    
/**
 * Delete message
 * 
 * @param mixed $reader_id
 * @return void
 */
	public function admin_delete(){
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException(SettingsController::read('Error.Code-12'));
        }
        $reader_id = $this->request->data['id']; // we recieve id via posted data
        $count = count($reader_id);
        if ($count == 1) {
            $reader_id = current($reader_id);

            if ($this->_delete($reader_id)) {
                $this->Session->setFlash('پیام با موفقیت حذف شد.', 'message', array('type' =>
                    'success'));
            } else {
                $this->Session->setFlash(SettingsController::read('Error.Code-16'), 'message', array('type' => 'error'));
            }
        } elseif ($count > 1) {
            $countAffected = 0;
            foreach ($reader_id as $i) {
                if ($this->_delete($i)) {
                    $countAffected++;
                }
            }
            $this->Session->setFlash($countAffected . ' پیام با موفقیت حذف شد.', 'message', array('type' => 'success'));
        }
        $this->redirect($this->referer());
	}
    

/**
 * Delete given message
 * 
 * @param mixed $reader_id, Reader.id for current message
 * @return
 */
    protected function _delete($reader_id){
        // Check User can access to this message id
        $message = $this->_readMessageByReaderID($reader_id);
        if(! $message){
            return false;
        }
        // if it is not parent
        if($message['Reader']['parent_id'] != 0){
            return $this->_delete($message['Reader']['parent_id']);
        }else{
            // get rows for this conversation
            $reader_ids = $this->_getReaderPath($message['Reader']['id']);
            
            // update folder of all
            if($this->Message->Reader->updateAll(array('folder' => $this->Message->folders['trash']), array('id' => $reader_ids ))){
                return true;
            }
            return false;
        }
    }
    
/**
 * Read message and load all conversation for it
 * 
 * @param mixed $reader_id
 * @return void
 */
	public function admin_read($reader_id = null){
	   $message = $this->_readMessageByReaderID($reader_id);
       if(! $message){
            $this->Session->setFlash('چنین پیامی یافت نشد.', 'message', array('type' => 'error'));
            $this->redirect(array('action' => 'index'));
       }
       if($this->request->isPost()){
            // if user want save message
			if($this->request->data['Message']['method'] == 'save'){
    			 // Save it
    		     if($this->_save($this->request->data['Message'])){
    		         $this->Session->setFlash('پیام با موفقیت ذخیره شد.', 'message', array('type' => 'success'));
                     $this->redirect(array('action' => 'index', 'folder' => $this->Message->folders['draft']));
    		     }else{
    		          $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
                     return;
    		     }
			}else{// if user want send message
    			 if($this->_send($this->request->data['Message'])){
                    $this->Session->setFlash('پیام با موفقیت ارسال گردید.', 'message', array('type' => 'success'));
                    $this->redirect(array('action' => 'index', 'folder' => $this->Message->folders['outbox']));
    		     }else{
    		          $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
                     return;
    		     }
			}
       }
       $message = $this->_getConversation($message['Reader']['id']);
       // set origin
       $origin = $message[0];
       unset($message[0]);
       
	   $this->set(array(
            'message' => $origin,
            'conversations' => $message,
       ));
       $this->helpers[] = 'TinyMCE.TinyMCE';
       $replyUsers = array();
       if($origin['Message']['Sender']['user_id'] == $this->Auth->user('id')){
            foreach($origin['Message']['Recipients'] as $recipient){
                $replyUsers[] = array(
                    'user_id' => $recipient['Recipient']['id'],
                    'user_name' => $recipient['Recipient']['name'],
                    'parent_id' => $recipient['id'],
                );
            }
       }else{
            $replyUsers[] = array(
                'user_id' => $origin['Message']['Sender']['SenderInfo']['id'],
                'user_name' => $origin['Message']['Sender']['SenderInfo']['name'],
                'parent_id' => $origin['Message']['Sender']['id'],
            );
       }
       // Get recipients for sending message
       $this->set('users',$replyUsers);
	}

/**
 * Get conversation for this message
 * 
 * @param mixed $reader_id
 * @return
 */
	protected function _getConversation($reader_id){
	   $message = $this->_readMessageByReaderID($reader_id);
       if(! $message){
            return false;
       }
       if($message['Reader']['parent_id'] != 0){
            return $this->_getConversation($message['Reader']['parent_id']);
       }else{
            return $this->_readMessageByReaderID($this->_getReaderPath($message['Reader']['id']));
       }
	}
    
/**
 * Return array of id for this parent
 * 
 * @param array ID
 * @return
 */
    protected function _getReaderPath($parentReader_id){
        $readers = array_merge(
            $this->Message->Reader->getPath($parentReader_id),
            $this->Message->Reader->children($parentReader_id)
        );
        return Set::combine($readers, '{n}.Reader.id', '{n}.Reader.id');    
    }


	public function _save($params = array()){
	   
	   // create data
	   $data['Message']['user_id'] = $data['Reader']['user_id'] = $this->Auth->user('id');
       $data['Message']['subject'] = (isset($params['subject'])?$params['subject']:'بدون موضوع');
       $data['Message']['message'] = $params['message'];
       $data['Message']['parent_id'] = 0; 
       $data['Reader']['read_date'] = 0;
       $data['Reader']['new'] = 0;
       // Save message as draft for User
       $data['Reader']['folder'] = $this->Message->folders['draft'];
        $data['Message']['created'] = Jalali::dateTime(); 
        //Save message, saver
        $this->Message->saveAll($data);
       //TODO: this public function return true in any conditions
       return $this->Message->id;
	}
    
    public function _send($params = array()){

        // Create Message
       $data['Message']['user_id'] = $data['Reader']['user_id'] = $this->Auth->user('id');
       $data['Message']['subject'] = $params['subject'];
       $data['Message']['message'] = $params['message'];
       $data['Message']['created'] = Jalali::dateTime();  
       $data['Reader']['read_date'] = 0;
       
       // Create Reader : Reader is current user
       $data['Reader']['new'] = 0;
       $data['Reader']['folder'] = $this->Message->folders['outbox'];
       $data['Reader']['is_sender'] = true;
       $data['Reader']['parent_id'] = (isset($params['parent_id']))?$params['parent_id']:0;

       // get data of recipients
       $i = 0;
       $recipients = array();
       foreach($params['Recipients'] as $recipient){
            // user can't send message to own
            if($recipient['user'] == $this->Auth->user('id')){
                continue;
            }
            $recipients[$i]['user_id'] = $recipient['user'];
            $recipients[$i]['read_date'] = 0;
            $recipients[$i]['new'] = 1;
            $recipients[$i]['folder'] = $this->Message->folders['inbox'];
            $recipients[$i]['parent_id'] = (isset($recipient['parent_id']))?$recipient['parent_id']:0;
            $i++;
       }
        
        //Save message, sender data
        $this->Message->saveAll($data);
        //Save recipients data
        foreach($recipients as $r){
            $this->Message->Recipients->create();
            $r['message_id'] = $this->Message->id;
            $this->Message->Recipients->save($r);
        }
       // return id for success saving otherwise return false
       return $this->Message->id;
    }
    
/**
 * return count of new message 
 * 
 * @return
 */
    public function countNewMessages(){
        $count = $this->find('count', array(
				'contain' => array('Reader'),
				'conditions'=>array('Reader.user_id'=>$this->Auth->user('id'), 'Reader.new' => 1, 'Reader.folder' => $this->folders['inbox'])
		));
		return $count;
    }
    
}