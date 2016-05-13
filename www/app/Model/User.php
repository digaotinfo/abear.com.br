<?php
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
	public $name = 'user';

     var $belongsTo = array(
       'Role' => array(
        'className'  => 'Role',
       )
     );

	public $validate = array(
		'username' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Favor informar o usuário'
			)
		),
		'password' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Favor informar a senha'
			)
		),
		'role' => array(
			'valid' => array(
				'rule' => array('inList', array('admin', 'author')),
				'message' => 'Por favor entre com o papel correto',
				'allowEmpty' => false
			)
		)
	);

	public function beforeSave() {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
}
