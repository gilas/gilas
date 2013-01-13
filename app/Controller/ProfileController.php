<?php
class ProfileController extends AppController{
    public $uses = array();
    public $publicActions = array('view');
    public $helpers = array('Profile');
    public $validRequestes = array(
        '/Contents/viewArticles',
        '/Contents/view',
        '/Contents/category',
    );
    
/**
 * Show info for given username
 * 
 * @param mixed $username
 * @return void
 */
    public function view($username = null){
        if(! $username){
            throw new NotFoundException(SettingsController::read('Error.Code-14'));
        }
        /**
         * Get Info
         */
        $userController = $this->_loadController('Certificates');
        $info = $userController->_getInfo($username);
        if(! $info){
            throw new NotFoundException(SettingsController::read('Error.Code-14'));
        }
        $this->set('info', $info);
        
        $contentController = $this->_loadController('Contents');
        $about = $contentController->_getAbout($info['User']['id']);
        $this->set('about', $about);
        
        $contentCategoryController = $this->_loadController('ContentCategories');
        $categories = $contentCategoryController->getList($info['User']['id']);
        $this->set('categories', $categories);
        
        $this->set('content',$this->_parseURL($info['User']['id']));
        
        $this->set('title_for_layout', 'صفحه شخصی '. $info['User']['name']);
    }
    
    /**
     * Parse URL and call requestAction
     * 
     * @param mixed $user_id
     * @return
     */
    protected function _parseURL($user_id = null){
        $passes = $this->request['pass'];
        unset($passes[0]);
        $url = array();
        
        if(empty($passes)){
            $url = array(
                'controller' => 'Contents',
                'action' => 'viewArticles',
            );
        }else{
            $url['controller'] = $passes[1];
            if(!empty($passes[2])){
                $url['action'] = $passes[2];    
            }else{
                $url['action'] = 'index';
            }
        }
        
        // Check request is valid, if not fill it by default request
        $request = '/'.$url['controller'].'/'.$url['action'];
        if(! in_array($request, $this->validRequestes)){
            $url = array(
                'controller' => 'Contents',
                'action' => 'viewArticles',
            );
        }
        
        unset($passes[1], $passes[2]);
        if(!empty($passes)){
            foreach($passes as $param){
                $url[] = $param;
            }
        }
        
        // Set requested url for use in view
        if(! in_array($request, $this->validRequestes)){
            $this->set('requestedURL', array());
        }else{
            $this->set('requestedURL', $url);
        }
        
        $named = $this->request['named'];
        if($named){
            foreach($named as $namedIndex => $namedValue){
                $url[$namedIndex] = $namedValue;
            }
        }
        $extra = array('return', 'forProfile' => true, 'ProfileUserID' => $user_id);
        if($this->request->data){
            $extra['data'] = $this->request->data;
        }
        
        // Convert to string
        //Notice : by converting it to string, other data that passes by $extra
        // (e.x. forProfile) don't merge by $url
        $url = Router::url($url);
        $url = substr($url, strlen($this->request->base));
        
        return $this->requestAction($url, $extra);
    }
}