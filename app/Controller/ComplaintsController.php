<?php

class ComplaintsController extends AppController{
    
    public $uses = array('Complaint','User');
    public $publicActions = array('register', 'showCode');
    
    public function register(){
        $conditions = array('User.role_id' => 3);
        if($this->request['forProfile']){
            $conditions['User.id'] = $this->request['ProfileUserID'];
        }
        $users = $this->User->find('list', array(
            'conditions' => $conditions,
        )); 
        
        $this->set(compact('users'));
        
        if($this->request->isPost()){
            if(! in_array($this->request->data['Complaint']['user_id'], array_keys($users))){
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
        $this->Complaint->recursive = -1;
        $info = $this->Complaint->read(null, $id);
        if(! $info){
            return false;
        }
        
        $desc = unserialize($info['Complaint']['status_desc']);
        $desc[]  = array(
            'status' => $status,
            'date' => Jalali::dateTime(),
        );
        $desc = serialize($desc);
        $this->Complaint->id = $id;

        return $this->Complaint->save(array('status' => $status, 'status_desc' => $desc));
    }
}