<?php
App::uses('AppController', 'Controller');
/**
 * Schools Controller
 *
 * @property School $School
 * @property PaginatorComponent $Paginator
 */
class SchoolsController extends AppController {
    
    public $helpers = array('Js');

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
		$this->School->recursive = 0;
		$this->set('schools', $this->paginate());
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
		if (!$this->School->exists($id)) {
			throw new NotFoundException(__('Invalid school'));
		}
		$options = array('conditions' => array('School.' . $this->School->primaryKey => $id));

                $school = $this->School->find('first', $options);
                $this->set('school', $school);
                $this->set('category',$this->School->Subcategory->Category->find('first', array('conditions' => array('id' => $school['Subcategory']['category_id']))));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->School->create();
			if ($this->School->save($this->request->data)) {
				$this->Session->setFlash(__('The school has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The school could not be saved. Please, try again.'), 'flash/error');
			}
		}
                // ligne générée par bake en raison de la relation "Post belongsTo Subcategory"
                // $subcategories = $this->Post->Subcategory->find('list');
                // remplacée par
        $categories = $this->School->Subcategory->Category->find('list');
        $subcategories = $this->School->Subcategory->find('list', array('conditions' => array('category_id' => 1)));
        $this->set(compact('categories', 'subcategories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->School->id = $id;
		if (!$this->School->exists($id)) {
			throw new NotFoundException(__('Invalid school'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->School->save($this->request->data)) {
				$this->Session->setFlash(__('The school has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The school could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('School.' . $this->School->primaryKey => $id));
			$this->request->data = $this->School->find('first', $options);
		}
                
                                // ligne générée par bake en raison de la relation "Post belongsTo Subcategory"
                // $subcategories = $this->Post->Subcategory->find('list');
                // remplacée par
                // 
                // 
       //         $categories = $this->School->Subcategory->Category->find('list');
       // if (isset($this->request->data['Subcategory'][0]['category_id'])) {
       //     $subcategories = $this->School->Subcategory->find('list', array('conditions' => array('category_id' => $this->request->data['Subcategory'][0]['category_id'])));
       // } else {
       //     $subcategories = $this->School->Subcategory->find('list', array('conditions' => array('category_id' => 1)));
       // }
       // 
       // 
       // 
        //$categories = $this->School->Subcategory->Category->find('list');
        //$subcategories = array('choisir categorie');
        //$subcategories = $this->School->Subcategory->find('list');
                 
        $categories = $this->School->Subcategory->Category->find('list'); 
        $this->request->data['School']['category_id'] = $this->request->data['Subcategory']['category_id'];
        if (isset($this->request->data['Subcategory']['category_id'])) {
            $subcategories = $this->School->Subcategory->find('list', array('conditions' => array('category_id' => $this->request->data['Subcategory']['category_id'])));
        } else {
            $subcategories = $this->School->Subcategory->find('list', array('conditions' => array('category_id' => 1)));
        }
        $this->set(compact('categories', 'subcategories'));      
        
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
		$this->School->id = $id;
		if (!$this->School->exists()) {
			throw new NotFoundException(__('Invalid school'));
		}
		if ($this->School->delete()) {
			$this->Session->setFlash(__('School deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('School was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
