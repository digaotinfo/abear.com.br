<?
    class Clipping extends AppModel{
    	var $useTable = 'tb_clipping';
    	var $order = array("Clipping.data" => "DESC");
    	
    	public $hashMany = 'ClippingHistorico';
    	
    	public function beforeDelete() {
    		parent::beforeDelete();
    		App::uses('CakeSession', 'Model/Datasource');
    		
    		$a_fieldSave["username"] = CakeSession::read('Auth.User.username');
    		$a_fieldSave["name"] = CakeSession::read('Auth.User.name');
    		$a_fieldSave["user_id"] = CakeSession::read('Auth.User.id');
    		$a_fieldSave["clipping_id"] = $this->id;
    		$a_fieldSave["acao"] = "D";
			
    		$registro = $this->find("first", array(
    					"fields" => array(
    							$this->alias.".id",
    							$this->alias.".data",
    							$this->alias.".titulo_ptbr",
    							$this->alias.".titulo_eng",
    							$this->alias.".titulo_esp",
    							$this->alias.".texto_ptbr",
    							$this->alias.".texto_eng",
    							$this->alias.".texto_esp",
    							$this->alias.".created",
    							$this->alias.".modified",
    					),
    					"conditions" => array(
    							$this->alias.".id" => $this->id
    					),
    			));
    			
    			$a_data = array(
    					"id"			=> $registro[$this->alias]["id"],
    					"data"			=> $registro[$this->alias]["data"],
    					"titulo_ptbr"	=> $registro[$this->alias]["titulo_ptbr"],
    					"titulo_eng"	=> $registro[$this->alias]["titulo_eng"],
    					"titulo_esp"	=> $registro[$this->alias]["titulo_esp"],
    					"texto_ptbr"	=> $registro[$this->alias]["texto_ptbr"],
    					"texto_eng"		=> $registro[$this->alias]["texto_eng"],
    					"texto_esp"		=> $registro[$this->alias]["texto_esp"],
    					"created"		=> $registro[$this->alias]["created"],
    					"modified"		=> $registro[$this->alias]["modified"],
    			);
			
    		$alteracao = "";
    		foreach( $a_data as $key => $val ):
    			$remove_apostrofos = str_replace( "'", "", $val );
    			$valorSemAcentos = str_replace( '"', "",  $remove_apostrofos );
				$alteracao = $alteracao." ".$key. " => ".$valorSemAcentos;    			

    		endforeach;
    		
    		$a_fieldSave["edicao"] = "Registro Deletado:<br>".$alteracao;
    		$a_fieldSave["delete"] = true;

    		$sql = "
    				INSERT INTO 
    					tb_clipping_historico (
    							id, 
    							user_id, 
    							clipping_id, 
    							username, 
    							name, 
    							acao, 
    							edicao, 
    							`delete`, 
    							created, 
    							modified
    							) 
    					values(
    						NULL, 
    						'{$a_fieldSave["user_id"]}', 
    						'{$a_fieldSave["clipping_id"]}', 
    						'{$a_fieldSave["username"]}', 
    						'{$a_fieldSave["name"]}', 
    						'{$a_fieldSave["acao"]}', 
    						'{$a_fieldSave["edicao"]}', 
    						{$a_fieldSave["delete"]}, 
    						'".date('Y-m-d H:i:s')."', 
    						'".date('Y-m-d H:i:s')."'
    					) ";
    		
    		
    		$this->query($sql);
    	}
    }
?>