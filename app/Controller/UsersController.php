<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Flash','Session');

        
        public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    $this->Auth->allow('logout');
    
    $this->Auth->allow('register', 'activate', 'login', 'send_mail');
    
    $this->Auth->deny('index', 'view', 'add');
}

public function login() {
    if ($this->request->is('post')) {
        $user = $this->User->find('first', array(
                'conditions' => array('User.username' => $this->request->data['User']['username'])
            ));
            if ($this->Auth->login()) {
               
                     $this->redirect(array('controller' => 'schools',
                                            'action' => 'index'));

    }
      $this->Flash->error(__('Invalid username or password, try again'));
}

}

public function logout() {
    return $this->redirect($this->Auth->logout());
}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 1;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
                            $datae = $this->request->data;
                            $this->send_mail($datae['User']['email'], $datae['User']['username'], $this->User->getInsertID(), $datae['User']['password']);
                            $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                            $this->redirect(array('action' => 'index'));
                                
                                
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
			}
                        
		}
	}
        
        /**
 * register method
 *
 * @return void
 */
	public function register() {
		if ($this->request->is('post')) {
                        $this->request->data['User']['role'] = 'visiteur';
			$this->User->create();
			if ($this->User->save($this->request->data)) {
                              $datae = $this->request->data;
                            $this->send_mail($datae['User']['email'], $datae['User']['username'], $this->User->getInsertID(), false);
				$this->Session->setFlash(__('The user has been saved. To add a new course you must be activated. You should have received an e-mail with a link to activate your account.'), 'flash/success');
				$this->redirect(array('controller' => 'users',
                                'action' => 'index'));
                                
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->User->id = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
        
        public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action == 'send_mail' && isset($user['role']) && $user['role'] === 'super-utilisateurs' || $user['role'] === 'visiteur') {

            // The owner of a post can edit.
            if (in_array($this->action, array('view'))) {
                $postId = (int) $this->request->params['pass'][0];
                if ($this->Session->read('Auth.User.id') == $postId) {
                    return true;
                }
            }
        }
            return parent::isAuthorized($user);
    }
    
  public function send_mail($recipient = null, $username = null, $id = null, $redirect = true) {
        $link = array('controller' => 'users', 'action' => 'activate', $id);
        App::uses('CakeEmail', 'Network/Email');
        $mail = new CakeEmail('gmail');
        $mail->from('noreply@localhost.com')->to($recipient)->subject('Mail Confirm');
        $mail->emailFormat('html')->template('activate')->viewVars(array('username' => $username, 'link' => $link));
        $mail->send();
        if ($redirect) {
            $this->redirect('/');
        }
    }

    public function activate($link){
        $linkA = explode('-', $link);
        $user = $this->User->find('first', array('conditions' => array('id' => $linkA[0], 'active' =>0)));
        if(!empty($user)){
            $this->User->id = $user['User']['id'];
            $this->User->saveField('active', 1);
            $this->User->saveField('role', 'super-utilisateurs');
            $this->Session->setFlash('Account Active');
            $this->redirect(array('action' => 'login'));

        }else {
            $this->Session->setFlash('L\'utilisateur à déja été activé ou n\'existe pas');
            $this->redirect('/');
        }

    }
}
