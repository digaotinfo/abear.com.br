<?php
App::uses('AppController', 'Controller');

class SitemapsController extends AppController {
	public $name 		= 'Sitemaps';
	public $uses 		= array('Sitemapcategoria', 'Sitemapsubcategoria');
	var $scaffold 		= 'admin';
		
	function beforeFilter() {
		parent::beforeFilter();
			
		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
		
			$showThisFields	=	array(
									'lateral'				=> 'Lateral',
									'categoria'				=> 'Categoria',
									'url'					=> 'URL',
									'blank'					=> 'Target _blank',
									'ordem'					=> 'Ordem',
									'ativo'					=> 'Ativo',
								);
			$showImage	=	array(
								''
							);
			
			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);
			
			$this->set('schemaTable', $this->Sitemapcategoria->schema());
			
		}
	}

	///// ADMIN
	//////////////////////////////////////////////////////
	//////////////////////////////////////////////////////
	//////////////////////////////////////////////////////
	/*

	//==> listar
	//-------------------------------------------------
	
	public function admin_index() {
		$model = 'Sitemapcategoria';
			
		//===-----> Apoio View 
			$this->set('menu_ativo', 'Sitemapcategoria');
			$this->set('model', $model);
		//==----------------------------------------
	
		$registros = $this->Sitemapcategoria->find('all');
		$this->set('registros', $this->paginate($model));

	}
	
	//-------------------------------------------------
	//-------------------------------------------------
	
	
	
	
	//==> Adicionar
	//-------------------------------------------------	
	public function admin_add() {
		$model = 'Sitemapcategoria';
		
		//===-----> Apoio View 
			$this->set('model', $model);
			
		//==----------------------------------------
		
		
		if ($this->request->is('post')) {
			
			// inicia validação da Model
			$this->$model->set($this->request->data);
			if ($this->$model->validates()) {
								
				// salva	
				if ($this->$model->save($this->request->data)) {
					$this->Session->setFlash('Registro salvo com sucesso!');
					$this->redirect(array('action' => 'index'));
				}
			}
			
			
        }
	}
	
	public function admin_subcategoriaadd($sitemapcategoria_id = null) {
		$model = 'Sitemapsubcategoria';
		
		if ($sitemapcategoria_id == null) {
			$this->redirect(array('action' => 'admin_index'));
		}
		
		//===-----> Apoio View 
			$this->set('model', $model);
			$this->set('sitemapcategorias', $this->Sitemapcategoria->find('list', array('fields' => array('id', 'categoria'), 'conditions' => array('ativo' => 1))));
			$this->set('sitemapcategoria_id', $sitemapcategoria_id);
			
		//==----------------------------------------
		
		
		if ($this->request->is('post')) {
			
			// inicia validação da Model
			$this->$model->set($this->request->data);
			if ($this->$model->validates()) {
				
				// realiza o upload
								
				// salva	
				if ($this->$model->save($this->request->data)) {
					$this->Session->setFlash('Registro salvo com sucesso!');
					$this->redirect(array('action' => 'index'));
				}
			}
			
			
        }
	}
	
	//-------------------------------------------------
	//-------------------------------------------------
	
	
	
	
	
	//==> Editar
	//-------------------------------------------------
	public function admin_edit($id = null) {
		$model = 'Sitemapcategoria';
		
		$this->$model->id = $id;
		
		//===-----> Apoio View 
			$this->set('model', $model);
			
		//==----------------------------------------
	
        if (!$this->$model->exists()) {
            throw new NotFoundException(__('Registro inexistente'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
			
			
			// inicia validação da Model
			$this->$model->set($this->request->data);
			if ($this->$model->validates()) {
								
				// salva
				if ($this->$model->save($this->request->data)) {
					$this->Session->setFlash('Registro salvo com sucesso!');
					$this->redirect(array('action' => 'index'));
				}
			}
        }
		
		$this->request->data = $this->$model->read(null, $id);
	}
	
	public function admin_subcategoriaedit($id = null) {
		$model = 'Sitemapsubcategoria';
		
		$this->$model->id = $id;
		
		//===-----> Apoio View 
			$this->set('model', $model);
			$this->set('sitemapcategorias', $this->Sitemapcategoria->find('list', array('fields' => array('id', 'categoria'), 'conditions' => array('ativo' => 1))));
			
		//==----------------------------------------
	
        if (!$this->$model->exists()) {
            throw new NotFoundException(__('Registro inexistente'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
			
			
			// inicia validação da Model
			$this->$model->set($this->request->data);
			if ($this->$model->validates()) {
								
				// salva
				if ($this->$model->save($this->request->data)) {
					$this->Session->setFlash('Registro salvo com sucesso!');
					$this->redirect(array('action' => 'index'));
				}
			}
        }
		
		$this->request->data = $this->$model->read(null, $id);
	}
	//-------------------------------------------------
	//-------------------------------------------------
	
	
	
	
	//==> Deletar
	//-------------------------------------------------
    public function admin_delete($id = null) {
		$model = 'Sitemapcategoria';
			  
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->$model->id = $id;
        if (!$this->$model->exists()) {
            throw new NotFoundException(__('Registro inexistente'));
        }
		
        if ($this->$model->delete()) {
			$this->redirect(array('action' => 'index'));
            $this->Session->setFlash(__('Registro excluído com sucesso.'));
           // $this->redirect(array('action' => 'index'));
       }
		
		
        $this->Session->setFlash(__('Registro não excluido.'));
        $this->redirect(array('action' => 'index'));
    }
	
    public function admin_subcategoriadelete($id = null) {
		$model = 'Sitemapsubcategoria';
			  
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->$model->id = $id;
        if (!$this->$model->exists()) {
            throw new NotFoundException(__('Registro inexistente'));
        }
		
        if ($this->$model->delete()) {
			$this->redirect(array('action' => 'index'));
            $this->Session->setFlash(__('Registro excluído com sucesso.'));
           // $this->redirect(array('action' => 'index'));
       }
		
		
        $this->Session->setFlash(__('Registro não excluido.'));
        $this->redirect(array('action' => 'index'));
    }
	//-------------------------------------------------
	//-------------------------------------------------
	
*/
}

