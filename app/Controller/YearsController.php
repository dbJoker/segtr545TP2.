<?php
App::uses('AppController', 'Controller');
/**
 * Years Controller
 *
 * @property Year $Year
 * @property PaginatorComponent $Paginator
 */
class YearsController extends AppController {

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
		$this->Year->recursive = 1;
		$this->set('years', $this->paginate());
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
		if (!$this->Year->exists($id)) {
			throw new NotFoundException(__('Invalid year'));
		}
		$options = array('conditions' => array('Year.' . $this->Year->primaryKey => $id));
		$this->set('year', $this->Year->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Year->create();
			if ($this->Year->save($this->request->data)) {
				$this->Session->setFlash(__('The year has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The year could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$schools = $this->Year->School->find('list');
		$courses = $this->Year->Course->find('list');
		$this->set(compact('schools', 'courses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Year->id = $id;
		if (!$this->Year->exists($id)) {
			throw new NotFoundException(__('Invalid year'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Year->save($this->request->data)) {
				$this->Session->setFlash(__('The year has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The year could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Year.' . $this->Year->primaryKey => $id));
			$this->request->data = $this->Year->find('first', $options);
		}
		$schools = $this->Year->School->find('list');
		$courses = $this->Year->Course->find('list');
		$this->set(compact('schools', 'courses'));
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
		$this->Year->id = $id;
		if (!$this->Year->exists()) {
			throw new NotFoundException(__('Invalid year'));
		}
		if ($this->Year->delete()) {
			$this->Session->setFlash(__('Year deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Year was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
