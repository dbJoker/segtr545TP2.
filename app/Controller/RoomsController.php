<?php

App::uses('AppController', 'Controller');

/**
 * Rooms Controller
 *
 * @property Room $Room
 * @property PaginatorComponent $Paginator
 */
class RoomsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator','Flash','Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Room->recursive = 0;
        $this->set('rooms', $this->paginate());
        if(!$this->Session->read('Auth.User.active') && $this->Session->check('Auth.User')){
          $this->Session->setFlash(__('Ce compte n\'a pas encore été activer. Vous ne pouvez rien ajouter, si vous vous activé vous pourrez ajouter des cours. Veuillez activer votre compte.'), 'flash/error');
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Room->exists($id)) {
            throw new NotFoundException(__('Invalid room'));
        }
        $options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
        $this->set('room', $this->Room->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Room->create();
            if ($this->Room->save($this->request->data)) {
                $this->Session->setFlash(__('The room has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The room could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $courses = $this->Room->Course->find('list');
        $this->set(compact('courses'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Room->id = $id;
        if (!$this->Room->exists($id)) {
            throw new NotFoundException(__('Invalid room'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Room->save($this->request->data)) {
                $this->Session->setFlash(__('The room has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The room could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
            $this->request->data = $this->Room->find('first', $options);
        }
        $courses = $this->Room->Course->find('list');
        $this->set(compact('courses'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Room->id = $id;
        if (!$this->Room->exists()) {
            throw new NotFoundException(__('Invalid room'));
        }
        if ($this->Room->delete()) {
            $this->Session->setFlash(__('Room deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Room was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
