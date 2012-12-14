<?php

/**
 * Raste Controller
 *
 * @property Raste $Raste
 */
class RastesController extends AppController {

    public function admin_index() {
        $this->set('title_for_layout', 'لیست رسته ها');
        $this->helpers[] = 'AdminForm';

        // must get data with paginate() for pagination
        $rastes = $this->paginate();
        $this->set('rastes', $rastes);
    }

    public function admin_add() {
        $this->set('title_for_layout', 'افزودن رسته های صنفی');
        if ($this->request->is('post')) {
            if ($this->Raste->save($this->request->data)) {
                $this->Session->setFlash('رسته با موفقیت افزوده شد.', 'message', array('type' => 'success'));
                $this->redirect(array('action' => 'index', 'admin' => TRUE));
            } else {
                $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
            }
        }
        $this->helpers[] = 'Validator';
    }

    public function admin_edit($id = NULL) {
        $this->set('title_for_layout', 'ویرایش رسته');
        $this->Raste->id = $id;
        if (!$this->Raste->exists()) {
            throw new NotFoundException(SettingsController::read('Error.Code-14'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Raste->save($this->request->data)) {
                $this->Session->setFlash('رسته با موفقیت ویرایش شد', 'message', array('type' => 'success'));
                $this->redirect(array('action' => 'index', 'admin' => TRUE));
            } else {
                $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
            }
        } else {
            $this->request->data = $this->Raste->read();
        }

        $this->helpers[] = 'Validator';
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
            $this->Raste->id = $id;

            if ($this->Raste->delete()) {
                $this->Session->setFlash('رسته با موفقیت حذف شد.', 'message', array('type' =>
                    'success'));
            } else {
                $this->Session->setFlash(SettingsController::read('Error.Code-16'), 'message', array('type' => 'error'));
            }
        } elseif ($count > 1) {

            // hold affected rows to show for user
            $countAffected = 0;

            // for each row that we must delete it
            foreach ($id as $i) {
                $this->Raste->id = $i;
                if ($this->Raste->delete()) {
                    $countAffected++;
                }
            }

            $this->Session->setFlash($countAffected . ' رسته با موفقیت حذف شد.', 'message', array('type' => 'success'));
        }

        // redirect to previouse page
        $this->redirect($this->referer());
    }

}

?>
