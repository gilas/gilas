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
        $places = $this->Place->find('all');
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
    }

    public function admin_delete($id = NULL) {
        $this->Place->id = $id;
        if (!$this->Place->exists()) {
            throw new NotFoundException(SettingsController::read('Error.Code-14'));
        }
        if ($this->request->is('post')) {
            
        }
    }

}

?>
