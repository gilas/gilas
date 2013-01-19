<?php

/*
 * Created By : Mohammad Razzaghi
 * Email : 1razzaghi@gmail.com
 * Blog : http://bigitblog.ir
 * Social Networks : 
 *          http://facebook.com/1razzaghi
 *          http://twitter.com/1razzaghi
 */

/**
 * Settings Controller
 *
 * @property Setting $Setting
 */
class SettingsController extends AppController {
    
    public $publicActions = array('read');
    
    // use for caching fetched settings
    private static $__cachedSetting = array();

    public function admin_index() {
        if($this->request->isPost()){
            foreach($this->request->data['Setting'] as $id => $value){
                $this->Setting->id = $id;
                $this->Setting->saveField('value',$value);
            }
			$this->Session->setFlash('تنظیمات با موفقیت ویرایش گردید.', 'message', array('type' => 'success'));
            $this->redirect($this->referer());
        }
        $this->set('title_for_layout', 'ویرایش تنظیمات سیستم');
        $sections = array();
        if(!empty($this->request->named['section'])){
            $sections = explode(',', $this->request->named['section']);
        }else{
            $sections = array('Site');
            if($this->Auth->user('Role.name') == 'SuperAdmin'){
                $sections[] = 'Error';
            }
        }
        $settings = $this->Setting->find('all', array('conditions' => array('section' => $sections)));
        $namedSection = array();
        if($settings){
            $newArray = array();
            foreach($settings as $setting){
                $newArray[$setting['Setting']['section']][$setting['Setting']['id']] = array(
                    'value' => $setting['Setting']['value'],
                    'alias' => $setting['Setting']['alias'], 
                    'params' => unserialize($setting['Setting']['params']),
                );
                 $namedSection[$setting['Setting']['section']] = $setting['Setting']['namedSection'];
            }
            $settings = $newArray;
        }
        $this->set(compact('settings', 'namedSection'));
    }

    public static function read($name) {
        // process parameter
        $sectionWithKey = String::tokenize($name, '.');
        $section = array_shift($sectionWithKey);
        $key = implode('.', $sectionWithKey);

        if (!empty(self::$__cachedSetting[$section])) {
            return self::$__cachedSetting[$section][$key];
        }

        $_this = new SettingsController();
        $_this->constructClasses();

        $settings = $_this->Setting->find('all', array(
            'conditions' => array(
                'section' => $section,
            ),
                ));
        if ($settings) {
            foreach ($settings as $setting) {
                self::$__cachedSetting[$section][$setting['Setting']['key']] = $setting['Setting']['value'];
            }
        }
        return self::$__cachedSetting[$section][$key];
    }

}

?>
