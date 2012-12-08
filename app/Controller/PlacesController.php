<?php

/**
 * Place Controller
 *
 * @property Place $Place
 */
class PlacesController extends AppController {

    public function admin_index() {
        $this->set('title_for_layout', 'لیست مکان ها');
        $this->helpers[] = 'AdminForm';
        
        // must get data with paginate() for pagination
        $places = $this->paginate();
        $this->set('places', $places);
    }

    public function admin_add() {
        $this->set('title_for_layout', 'افزودن مکان');
        if ($this->request->is('post')) {
            if ($this->Place->save($this->request->data)) {
                $this->Session->setFlash('مکان با موفقیت ذخیره شد.', 'message', array('type' => 'success'));
                $this->redirect(array('action' => 'index', 'admin' => TRUE));
            } else {
                $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
            }
        }
        $this->helpers[]='Validator';
    }

    public function admin_edit($id = NULL) {
        $this->Place->id = $id;
        if (!$this->Place->exists()) {
            throw new NotFoundException(SettingsController::read('Error.Code-14'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Place->save($this->request->data)) {
                $this->Session->setFlash('مکان با موفقیت ویرایش شد', 'message', array('type' => 'success'));
                $this->redirect(array('action' => 'index', 'admin' => TRUE));
            } else {
                $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
            }
        } else {
            $this->request->data = $this->Place->read();
        }
        
        $this->helpers[]='Validator';
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
            $this->Place->id = $id;

            if ($this->Place->delete()) {
                $this->Session->setFlash('مکان با موفقیت حذف شد.', 'message', array('type' =>
                    'success'));
            } else {
                $this->Session->setFlash(SettingsController::read('Error.Code-16'), 'message', array('type' => 'error'));
            }
        } elseif ($count > 1) {
            
            // hold affected rows to show for user
            $countAffected = 0;
            
            // for each row that we must delete it
            foreach ($id as $i) {
                $this->Place->id = $i;
                if ($this->Place->delete()) {
                    $countAffected++;
                }
            }
            
            $this->Session->setFlash($countAffected . ' مکان با موفقیت حذف شد.', 'message', array('type' => 'success'));
        }
        
        // redirect to previouse page
        $this->redirect($this->referer());
    }

}

?>
