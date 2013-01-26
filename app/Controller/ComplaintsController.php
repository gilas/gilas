<?php

class ComplaintsController extends AppController{
    
    public $uses = array('Complaint','UserInformation');
    public $publicActions = array('register', 'showCode', 'viewComplaint');
    public $helpers = array('UploadPack.Upload');
    
    public $paginateConditions = array(
      'name' => array(
        'field' => array(
                  'Complaint.comp_name',
                  'Complaint.comp_family'
                  ),
        'type' => 'LIKE',
      ),
      'status' => array(
        'field' => 'Complaint.status',
      ),
      'code' => array(
        'field' => 'Complaint.code_rahgiri',
      ),
    );
    
    public function register(){
        $conditions = array('UserInformation.status' => 3);
        if($this->request['forProfile']){
            $conditions['UserInformation.id'] = $this->request['Profile.UserInformation.id'];
        }
        $users = $this->UserInformation->find('all', array(
            'conditions' => $conditions,
            'contain' => false,
        )); 
        
        $this->set(compact('users'));
        
        if($this->request->isPost()){
            if(! in_array($this->request->data['Complaint']['user_information_id'], Set::combine($users, '{n}.UserInformation.id','{n}.UserInformation.id'))){
                $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
                return false;
            }
            if($this->Complaint->save($this->request->data)){
				$code = 'C-'. Jalali::date('His').sprintf('%04d', $this->Complaint->id);
				$this->Complaint->saveField('code_rahgiri', $code);
                $this->_changeStatus($this->Complaint->id, 0);
				// Redirect user, because with this he can't resend information again by refreshing page
				$this->redirect(array('action' => 'showCode', $code));
			}else{
			
			     $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
			}
        }
        
    }
    
    public function showCode($code){
		$request = $this->Complaint->find('first', array(
			'conditions' => array(
				'code_rahgiri' => $code,
			),
			'contain' => false, 
		));
		if(! $request){
			$this->redirect(array('action' => 'register'));
		}
		$this->set('codeRahgiri',$code);
	}
    
    protected function _changeStatus($id, $status = null){
        /**
         * Status cann't be null
         */
        if(is_null($status)){
            return false;
        }
        
        $info = $this->Complaint->read(null, $id);
        if(! $info){
            return false;
        }
        $this->Complaint->id = $id;
        
        // Send PM
        if($status == 1){
            $this->_sendPM($info['UserInformation']['user_id'], 'شکایت شماره '.$info['Complaint']['id'], '<p>واحد صنفی گرامی, از شما شکایتی به دست اتحادیه رسیده است. </p><p> لطفا با مشاهده شکایت مربوطه دفاعیه خود را اعلام نمائید. </p>');
            $this->Complaint->save(array('commit_date' => $this->request->data['commiteDate']));
        }
        
        // Save Comite date
        if($status == 3){
            $this->Complaint->save(array('commit_date' => $this->request->data['commiteDate']));
        }
        
        // Save Final vote
        if($status == 4){
            $this->Complaint->save(array('commit_vote' => $this->request->data['desc']));
        }
        
        $desc = unserialize($info['Complaint']['status_desc']);
        $desc[]  = array(
            'user_id' => $this->Auth->user('id'),
            'status' => $status,
            'date' => Jalali::dateTime(),
        );
        $desc = serialize($desc);
        

        return $this->Complaint->save(array('status' => $status, 'status_desc' => $desc));
    }
    
    public function admin_index() {
        $this->set('title_for_layout', 'لیست شکایت ها');
        $this->helpers[] = 'AdminForm';
        if(empty($this->request->named['published'])){
            $this->paginate['conditions']['Complaint.status <>'] = -1;
        }
        $this->paginate['order'] = 'Complaint.id DESC';
        // must get data with paginate() for pagination
        $requests = $this->paginate();
        $this->set('requests', $requests);
        $this->set('statusOptions', $this->Complaint->namedStatus);
    }
    
    public function admin_view($id = null) {
        $this->set('title_for_layout', 'مشاهده شکایت');
        $complaint = $this->Complaint->read(null, $id);
        if(! $complaint){
            $this->redirect($this->referer());
        }
        $this->set('complaint', $complaint);
        $this->set('formattedStatus', $this->Complaint->formattedStatus);
    }
    
    public function index(){
        $this->set('title_for_layout', 'لیست شکایت ها');
        $this->helpers[] = 'AdminForm';
        if(empty($this->request->named['published'])){
            $this->paginate['conditions']['Complaint.status >='] = 1;
        }
        $this->paginate['order'] = 'Complaint.id DESC';
        $this->paginate['conditions']['Complaint.user_information_id'] = $this->Auth->user('UserInformation.id');
        // must get data with paginate() for pagination
        $requests = $this->paginate();
        $this->set('requests', $requests);
        $this->set('statusOptions', $this->Complaint->namedStatus);
    }
    public function countNewComplaints(){
      $conditions = array();
      
      if($this->Auth->user('role_id') == 3){
        $conditions = array(
              'Complaint.user_information_id' => $this->Auth->user('UserInformation.id'),
              'Complaint.status' => 1,
          );
      }else{
        $conditions = array('Complaint.status' => 0);
      }
        return $this->Complaint->find('count', array(
            'conditions' => $conditions,
        ));
    }
    public function view($id = null){
        $this->set('title_for_layout', 'مشاهده شکایت');
        $complaint = $this->_readComplaint($id);
        if(! $complaint){
            $this->redirect($this->referer());
        }
        $this->set('complaint', $complaint);
    }
    
    public function admin_changeStatus($id){
        // the request must be sent via post
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException(SettingsController::read('Error.Code-12'));
        }
        $this->Complaint->id = $id;
        if(! $this->Complaint->exists()){
            throw new NotFoundException(SettingsController::read('Error.Code-14'));
        }
        if($this->_changeStatus($id, $this->request->data('status'))){
            $this->Session->setFlash('وضعیت شکایت مربوطه تغییر یافت', 'message', array('type' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
        $this->redirect($this->referer());
    }
    
    public function viewComplaint(){
        if($this->request->isPost()){
            $code = $this->request->data('Complaint.code');
            $complaint = $this->Complaint->find('first', array(
                'conditions' => array(
                    'Complaint.code_rahgiri' => $code,
                ),
            ));
            if($complaint){
                $this->set(compact('complaint'));
            }else{
                $this->Session->setFlash('چنین شکایتی یافت نشد', 'message', array('type' => 'error'));
            }
        }
    }
    
    public function addReply($id = null){
        $complaint = $this->_readComplaint($id);
        if(! $complaint){
            $this->redirect(array('action' => 'index'));
        }
        $this->Complaint->id = $complaint['Complaint']['id'];
        if($this->Complaint->saveField('user_defence', $this->request->data['defence'])){
            $this->_changeStatus($id, 2);
            $this->redirect(array('action' => 'index'));
        }
        $this->redirect(array('action' => 'index'));
    }
    
    protected function _readComplaint($id = null){
        return $this->Complaint->find('first', array(
            'conditions' => array(
                'Complaint.user_information_id' => $this->Auth->user('UserInformation.id'),
                'Complaint.status >=' => 1,
                'Complaint.id' => $id,
            ),
        ));
    }
}