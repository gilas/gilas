<?php

class CertificatesController extends AppController{
	
	public $uses = array('UserInformation', 'Option', 'Warden', 'Doc', 'Inquiry');
	public $publicActions = array('register', 'showCode', 'view', 'index');
	public $helpers = array('UploadPack.Upload');
	public $paginateConditions = array(
		'name' => array(
			'field' => array(
                'UserInformation.last_name',
                'UserInformation.first_name'
                ),
			'type' => 'LIKE',
		),
		'published' => array(
			'field' => 'UserInformation.status',
		),
        'code' => array(
			'field' => 'UserInformation.code_rahgiri',
		),
	);
	public function register(){
		if($this->request->is('post')){
			$this->request->data['UserInformation']['birth_day'] =
				$this->request->data['UserInformation']['birth_date']['year'] .'-'.
				$this->request->data['UserInformation']['birth_date']['month'] .'-'.
				$this->request->data['UserInformation']['birth_date']['day']; 
			if($this->UserInformation->save($this->request->data)){
				$code = Jalali::date('His').sprintf('%04d', $this->UserInformation->id);
				$this->UserInformation->saveField('code_rahgiri', $code);
				// Redirect user, because with this he can't resend information again by refreshing page
				$this->redirect(array('action' => 'showCode', $code));
			}else{
			     $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
			}
		}
        $this->set('cities',$this->UserInformation->State->find('threaded'));
        $this->set('places',$this->UserInformation->Place->find('list'));
        $this->set('rastes',$this->UserInformation->Raste->find('list'));
        $this->set('degrees',$this->UserInformation->Degree->find('list'));
        $this->set('vazeyatJoghrafiaeeOptions', $this->UserInformation->namedVazeyatJoghrafiaee);
        $this->set('mahaleEsteghrarOptions', $this->UserInformation->namedMahaleEsteghrar);
        $this->set('vazeyatMalekiatOptions', $this->UserInformation->namedVazeyatMalekiat);
        $this->set('isargariOptions', $this->UserInformation->namedIsargari);
        $this->set('vazifehOmoomiOptions', $this->UserInformation->namedVazifehOmoomi);
        $this->set('madrakTahsiliOptions', $this->UserInformation->namedMadrakTahsili);
        $this->set('genderOptions', $this->UserInformation->namedGender);
        $this->set('taaholOptions', $this->UserInformation->namedTaahol);
        $this->set('docs', $this->Option->find('list', array(
            'conditions' => array(
                'Option.section' => 'docs',
            )
        )));
	}
	
	public function showCode($code){
		$request = $this->_getRequestByCode($code, false);
		if(! $request){
			$this->redirect(array('action' => 'register'));
		}
		$this->set('codeRahgiri',$code);
	}
	
	protected function _getRequestByCode($code, $contain = true){
		return $this->UserInformation->find('first', array(
			'conditions' => array(
				'code_rahgiri' => $code,
			),
			'contain' => $contain, 
		));
	}
	
	
	public function admin_index() {
        $this->set('title_for_layout', 'لیست درخواست ها');
        $this->helpers[] = 'AdminForm';
        if(empty($this->request->named['published'])){
            $this->paginate['conditions']['UserInformation.status <>'] = -1;
        }
        $this->paginate['order'] = 'UserInformation.id DESC';
        // must get data with paginate() for pagination
        $requests = $this->paginate();
        $this->set('requests', $requests);
        $this->set('statusOptions', $this->UserInformation->namedStatus);
    }
    
    protected function _changeStatus($id, $status = null, $statusDesc = null){
        /**
         * Status cann't be null
         */
        if(is_null($status)){
            return false;
        }
        /**
         * Can not change status to new request
         */
        if($status == 0){
            return false;
        }
        /**
         * all negetive status must be has description
         */
        if($status < 0 and empty($statusDesc)){
            return false;
        }
        $this->UserInformation->recursive = -1;
        $info = $this->UserInformation->read(null, $id);
        if(! $info){
            return false;
        }

        switch($status){
            case 1:
            case -1:
                if($info['UserInformation']['status'] != 0) 
                    return false; 
                break;
            case 2:
                if($info['UserInformation']['status'] != 1) 
                    return false;
                break;
            case 3:
            case -3:
                if($info['UserInformation']['status'] != 2) 
                    return false;
                break;
            
        }
        $desc = unserialize($info['UserInformation']['status_desc']);
        
        // Cann't sat saved status again
        $savedStatues = Set::combine($desc, '{n}.status', '{n}.status');
        if(in_array($status, $savedStatues)){
            return false;
        }
        
        $desc[]  = array(
            'user_id' => $this->Auth->user('id'),
            'status' => $status,
            'date' => Jalali::dateTime(),
            'desc' => $statusDesc,
        );
        $desc = serialize($desc);
        $this->UserInformation->id = $id;

        $return =  $this->UserInformation->save(array('status' => $status, 'status_desc' => $desc));
        
        // Create User
        if($return and $status == 1){
            $obj = $this->_loadController('Users');
            $user_id = $obj->_createUser(array(
                'name' => $info['UserInformation']['first_name'].' '.$info['UserInformation']['last_name'],
                'username' => $info['UserInformation']['code_melli'],
                'password' => $info['UserInformation']['shenasnameh_number'],
                'role_id' => 3,
                // We don't get email from user 
                //'email' => $info['UserInformation']['email'],
            ));
            $this->UserInformation->saveField('user_id', $user_id);
        }
        return $return;
    }
    public function admin_changeStatus($id){
        // the request must be sent via post
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException(SettingsController::read('Error.Code-12'));
        }
        $this->UserInformation->id = $id;
        if(! $this->UserInformation->exists()){
            throw new NotFoundException(SettingsController::read('Error.Code-14'));
        }
        if($this->_changeStatus($id, $this->request->data('status'), $this->request->data('desc'))){
            $this->Session->setFlash('وضعیت درخواست مربوطه تغییر یافت', 'message', array('type' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
        $this->redirect($this->referer());
    }
    public function admin_remove($id){
        $this->UserInformation->id = $id;
        if(! $this->UserInformation->exists()){
            throw new NotFoundException(SettingsController::read('Error.Code-14'));
        }
        if ($this->UserInformation->saveField('status',-1)) {
            $this->Session->setFlash('درخواست با موفقیت حذف گردید.', 'message', array('type' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(SettingsController::read('Error.Code-16'), 'message', array('type' => 'error'));
        $this->redirect($this->referer());
    }

    public function admin_delete() {
        // the request must be sent via post
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException(SettingsController::read('Error.Code-12'));
        }

        // we recieve id via posted data
        $id = $this->request->data['id'];

        // get count of row that user want to delete
        $count = count($id);

        // user want to delete one row
        if ($count == 1) {
            $id = current($id);
            $this->UserInformation->id = $id;
            if(! $this->UserInformation->exists()){
                throw new NotFoundException(SettingsController::read('Error.Code-14'));
            }
            if ($this->UserInformation->saveField('status',-1)) {
                $this->Session->setFlash('درخواست با موفقیت حذف گردید.', 'message', array('type' => 'success'));
            } else {
                $this->Session->setFlash(SettingsController::read('Error.Code-16'), 'message', array('type' => 'error'));
            }
        } elseif ($count > 1) {

            // hold affected rows to show for user
            $countAffected = 0;

            // for each row that we must delete it
            foreach ($id as $i) {
                $this->UserInformation->id = $i;
                if(! $this->UserInformation->exists()){
                    throw new NotFoundException(SettingsController::read('Error.Code-14'));
                }
                if ($this->UserInformation->saveField('status',-1)) {
                    $countAffected++;
                }
            }

            $this->Session->setFlash($countAffected . ' درخواست با موفقیت حذف گردید.', 'message', array('type' => 'success'));
        }

        // redirect to previouse page
        $this->redirect($this->referer());
    }
    
/**
 * Get count of request for given $status
 * 
 * @param integer $status : Status of request
 * @return array of requests or false
 */
    public function getCountRequest($status = 0){
        return $this->UserInformation->find('count',array(
            'conditions' => array(
                'UserInformation.status' => $status,
            ),
            'contain' => false,
        ));
    }
    
    public function admin_view($id){
        $request = $this->UserInformation->read(null, $id);
        $this->set('request', $request);
        $this->set('wardenOptions', $this->_loadWarden($id));
        $this->set('docsOptions',  $this->_loadDoc($id));
        $this->set('inquiriesOptions',  $this->_loadInquiry($id));
        $this->set('formattedStatus', $this->UserInformation->formattedStatus);
        $this->set('cities',$this->UserInformation->State->find('threaded'));
        $this->set('places',$this->UserInformation->Place->find('list'));
        $this->set('rastes',$this->UserInformation->Raste->find('list'));
        $this->set('degrees',$this->UserInformation->Degree->find('list'));
        $this->set('vazeyatJoghrafiaeeOptions', $this->UserInformation->namedVazeyatJoghrafiaee);
        $this->set('mahaleEsteghrarOptions', $this->UserInformation->namedMahaleEsteghrar);
        $this->set('vazeyatMalekiatOptions', $this->UserInformation->namedVazeyatMalekiat);
        $this->set('isargariOptions', $this->UserInformation->namedIsargari);
        $this->set('vazifehOmoomiOptions', $this->UserInformation->namedVazifehOmoomi);
        $this->set('madrakTahsiliOptions', $this->UserInformation->namedMadrakTahsili);
        $this->set('genderOptions', $this->UserInformation->namedGender);
        $this->set('taaholOptions', $this->UserInformation->namedTaahol);
    }
    
    protected function _loadDoc($id){
                // load options of docs
        $docsOptions = $this->Option->find('list', array(
            'conditions' => array(
                'Option.section' => 'docs',
            ),
        ));
        // Options that submitted with docs
        $docsSubmitOptions = $this->Doc->find('all', array(
            'conditions' => array(
                'Doc.user_information_id' => $id,
            ),
            'contaion' => false,
        ));
        
        // Merge options with submitted options
        // I want for any option if has submitted fill below var
        $formattedOptions = array();
        if($docsOptions){
            foreach($docsOptions as $optionID => $optionValue){
                $formattedOptions[$optionID]['option_value'] = $optionValue;
                $formattedOptions[$optionID]['option_id'] = $optionID;
                $formattedOptions[$optionID]['submitted_value'] = 0;
                $formattedOptions[$optionID]['submitted_desc'] = null;
                $formattedOptions[$optionID]['submitted_id'] = 0;
                if($docsSubmitOptions){
                    foreach($docsSubmitOptions as &$docsSubmitOption){
                        if($docsSubmitOption['Doc']['option_id'] == $optionID){
                            $formattedOptions[$optionID]['submitted_id'] = $docsSubmitOption['Doc']['id'];
                            $formattedOptions[$optionID]['submitted_value'] = $docsSubmitOption['Doc']['value'];
                            $formattedOptions[$optionID]['submitted_desc'] = $docsSubmitOption['Doc']['description'];
                            //remove this , because we don't need it for later loop
                            // this is useful for decrease time of loop
                            unset($docsSubmitOption);
                            continue;
                        }
                    }
                }
            }
        }
        return $formattedOptions;
    }
    protected function _loadWarden($id){
        // load options of warden
        $wardenOptions = $this->Option->find('list', array(
            'conditions' => array(
                'Option.section' => 'warden',
            ),
        ));
        // Options that submitted with warden
        $wardenSubmitOptions = $this->Warden->find('all', array(
            'conditions' => array(
                'Warden.user_information_id' => $id,
            ),
            'contaion' => false,
        ));
        
        // Merge options with submitted options
        // I want for any option if has submitted fill below var
        $formattedOptions = array();
        if($wardenOptions){
            foreach($wardenOptions as $optionID => $optionValue){
                $formattedOptions[$optionID]['option_value'] = $optionValue;
                $formattedOptions[$optionID]['option_id'] = $optionID;
                $formattedOptions[$optionID]['submitted_value'] = 0;
                $formattedOptions[$optionID]['submitted_desc'] = null;
                $formattedOptions[$optionID]['submitted_id'] = 0;
                if($wardenSubmitOptions){
                    foreach($wardenSubmitOptions as &$wardenSubmitOption){
                        if($wardenSubmitOption['Warden']['option_id'] == $optionID){
                            $formattedOptions[$optionID]['submitted_id'] = $wardenSubmitOption['Warden']['id'];
                            $formattedOptions[$optionID]['submitted_value'] = $wardenSubmitOption['Warden']['value'];
                            $formattedOptions[$optionID]['submitted_desc'] = $wardenSubmitOption['Warden']['description'];
                            //remove this , because we don't need it for later loop
                            // this is useful for decrease time of loop
                            unset($wardenSubmitOption);
                            continue;
                        }
                    }
                }
            }
        }
        return $formattedOptions;
    }
    protected function _loadInquiry($id){
        // load options of inquiry
        $inquiryOptions = $this->Option->find('list', array(
            'conditions' => array(
                'Option.section' => 'inquiry',
            ),
        ));
        // Options that submitted with inquiry
        $inquirySubmitOptions = $this->Inquiry->find('all', array(
            'conditions' => array(
                'Inquiry.user_information_id' => $id,
            ),
            'contaion' => false,
        ));
        
        // Merge options with submitted options
        // I want for any option if has submitted fill below var
        $formattedOptions = array();
        if($inquiryOptions){
            foreach($inquiryOptions as $optionID => $optionValue){
                $formattedOptions[$optionID]['option_value'] = $optionValue;
                $formattedOptions[$optionID]['option_id'] = $optionID;
                $formattedOptions[$optionID]['submitted_value'] = 0;
                $formattedOptions[$optionID]['submitted_desc'] = null;
                $formattedOptions[$optionID]['submitted_id'] = 0;
                if($inquirySubmitOptions){
                    foreach($inquirySubmitOptions as &$inquirySubmitOption){
                        if($inquirySubmitOption['Inquiry']['option_id'] == $optionID){
                            $formattedOptions[$optionID]['submitted_id'] = $inquirySubmitOption['Inquiry']['id'];
                            $formattedOptions[$optionID]['submitted_value'] = $inquirySubmitOption['Inquiry']['value'];
                            $formattedOptions[$optionID]['submitted_desc'] = $inquirySubmitOption['Inquiry']['description'];
                            //remove this , because we don't need it for later loop
                            // this is useful for decrease time of loop
                            unset($inquirySubmitOption);
                            continue;
                        }
                    }
                }
            }
        }
        return $formattedOptions;
    }
    public function view(){
        if($this->Auth->user('UserInformation')){
            $this->set('request', $this->UserInformation->read(null, $this->Auth->user('UserInformation.id')));
            return;
        }
        if($this->request->isPost()){
            $code = $this->request->data('UserInformation.code');
            $request = $this->_getRequestByCode($code);
            if($request){
                $this->set(compact('request'));
            }else{
                $this->Session->setFlash('چنین درخواستی یافت نشد', 'message', array('type' => 'error'));
            }
        }
    }
    
    public function admin_changeWarden(){
        // the request must be sent via post
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException(SettingsController::read('Error.Code-12'));
        }
        if(!empty($this->request->data['id'])){
            $this->Warden->id = $this->request->data['id'];
        }else{
            $this->Warden->create();
        }
        unset($this->request->data['id']);
        if($this->Warden->save($this->request->data)){
            $this->Session->setFlash('تغییرات انجام گردید', 'message', array('type' => 'success'));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
        $this->redirect($this->referer());
    }
    public function admin_changeInquiry(){
        // the request must be sent via post
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException(SettingsController::read('Error.Code-12'));
        }
        if(!empty($this->request->data['id'])){
            $this->Inquiry->id = $this->request->data['id'];
        }else{
            $this->Inquiry->create();
        }
        unset($this->request->data['id']);
        if($this->Inquiry->save($this->request->data)){
            $this->Session->setFlash('تغییرات انجام گردید', 'message', array('type' => 'success'));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
        $this->redirect($this->referer());
    }
    
    public function admin_changeDocs(){
        // the request must be sent via post
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException(SettingsController::read('Error.Code-12'));
        }
        if(!empty($this->request->data['id'])){
            $this->Doc->id = $this->request->data['id'];
        }else{
            $this->Doc->create();
        }
        unset($this->request->data['id']);
        if($this->Doc->save($this->request->data)){
            $this->Session->setFlash('تغییرات انجام گردید', 'message', array('type' => 'success'));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
        $this->redirect($this->referer());
    }
    
    public function admin_print($id = null){
        $this->layout = 'print';
        // Call this function for load all data from tables
        $this->admin_view($id);
    }
    
/**
 * Return info of current username, this method can use between Controllers 
 * 
 * @param mixed $username
 * @return void
 */
    public function _getInfo($username = null){
        return $this->UserInformation->find('first', array(
            'contain' => array('User', 'Raste', 'Degree', 'Place'),
            'conditions' => array('User.username' => $username),
        ));
    }
    
/**
 * List all Register Users
 * 
 * @return void
 */
    public function index() {
        $this->set('title_for_layout', 'لیست اعضا');
        $this->helpers[] = 'AdminForm';
        $this->paginate['conditions'] = array(
            'UserInformation.user_id IS NOT NULL',
            'UserInformation.status >= ' => 3,
        );
        $this->paginate['contain'] = 'User';
        $requests = $this->paginate();
        $this->set('requests', $requests);
    }
    
    public function admin_editField(){
        $this->autoRender = false;
        $this->UserInformation->id = $this->request->data['id'];
        if(! $this->UserInformation->exists()){
            return 'درخواست ارسالی معتبر نمی باشد';
        }
        $return = $this->UserInformation->saveField($this->request->data['field'], $this->request->data['value'], true);
        if($return === false){
            return 'اشکال در ذخیره تغییرات';
        }
        return true;
    }
}
