<?php
App::uses('AppController', 'Controller');
/**
 * YearsCourses Controller
 *
 * @property YearsCourse $YearsCourse
 * @property PaginatorComponent $Paginator
 */
class YearsCoursesController extends AppController {

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
		$this->YearsCourse->recursive = 0;
		$this->set('yearsCourses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->YearsCourse->exists($id)) {
			throw new NotFoundException(__('Invalid years course'));
		}
		$options = array('conditions' => array('YearsCourse.' . $this->YearsCourse->primaryKey => $id));
		$this->set('yearsCourse', $this->YearsCourse->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->YearsCourse->create();
			if ($this->YearsCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The years course has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The years course could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$years = $this->YearsCourse->Year->find('list');
		$courses = $this->YearsCourse->Course->find('list');
		$this->set(compact('years', 'courses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->YearsCourse->id = $id;
		if (!$this->YearsCourse->exists($id)) {
			throw new NotFoundException(__('Invalid years course'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->YearsCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The years course has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The years course could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('YearsCourse.' . $this->YearsCourse->primaryKey => $id));
			$this->request->data = $this->YearsCourse->find('first', $options);
		}
		$years = $this->YearsCourse->Year->find('list');
		$courses = $this->YearsCourse->Course->find('list');
		$this->set(compact('years', 'courses'));
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
		$this->YearsCourse->id = $id;
		if (!$this->YearsCourse->exists()) {
			throw new NotFoundException(__('Invalid years course'));
		}
		if ($this->YearsCourse->delete()) {
			$this->Session->setFlash(__('Years course deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Years course was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
