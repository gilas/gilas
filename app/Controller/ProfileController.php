<?php
class ProfileController extends AppController{
    public $uses = array();
    
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
    }
}