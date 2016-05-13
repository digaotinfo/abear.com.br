<?
    class Clipping extends AppModel{
    	var $useTable = 'tb_clipping';
    	var $order = array("Clipping.data" => "DESC");
    	
    	public $hashMany = 'ClippingHistorico';
    	
    	function afterSave($options = array())	{
    		App::uses('CakeSession', 'Model/Datasource');
    		
    		$alteracao = "";
    		if(empty($this->data[$this->alias]['id'])){
    			//INSERT
    			$a_fieldSave["acao"] = "Criado";
    			$a_data = array(
    				"data"			=> $this->data[$this->alias]["data"],
    				"titulo_ptbr"	=> $this->data[$this->alias]["titulo_ptbr"],
    				"titulo_eng"	=> $this->data[$this->alias]["titulo_eng"],
    				"titulo_esp"	=> $this->data[$this->alias]["titulo_esp"],
    				"texto_ptbr"	=> $this->data[$this->alias]["texto_ptbr"],
    				"texto_eng"		=> $this->data[$this->alias]["texto_eng"],
    				"texto_esp"		=> $this->data[$this->alias]["texto_esp"],
    			);
    			foreach( $a_data as $key => $val ):
	    			switch ($key) {
	    				case "titulo_ptbr":
	    					$label = "Titulo em Português";
	    					if(!empty($val)) $alteracao = $alteracao.$label." Criado ".$this->data[$this->alias]["titulo_ptbr"]. "<br>";
	    					break;
	    				case "titulo_eng":
	    					$label = "Titulo em Inglês";
	    					if(!empty($val)) $alteracao = $alteracao.$label." Criado ".$this->data[$this->alias]["titulo_eng"]. "<br>";
	    					break;
	    				case "titulo_esp":
	    					$label = "Titulo em Espanhol";
	    					if(!empty($val)) $alteracao = $alteracao.$label. " Criado ".$this->data[$this->alias]["titulo_esp"]. "<br>";
	    					break;
	    				case "texto_ptbr":
	    					$label = "Texto em Português";
	    					if(!empty($val)) $alteracao = $alteracao.$label. " Criado ".$this->data[$this->alias]["texto_ptbr"]. "<br>";
	    					break;
	    				case "texto_eng":
	    					$label = "Texto em Inglês";
	    					if(!empty($val)) $alteracao = $alteracao.$label. " Criado ".$this->data[$this->alias]["texto_eng"]. "<br>";
	    					break;
	    				case "texto_esp":
	    					$label = "Texto em Espanhol";
	    					if(!empty($val)) $alteracao = $alteracao.$label." Criado ".$this->data[$this->alias]["texto_esp"]. "<br>";
	    					break;
	    				case "data":
	    					$label = "Data";
	    					if(!empty($val)) $alteracao = $alteracao.$label. " Criado ".$this->data[$this->alias]["data"]. "<br>";
	    					break;
	    			}
	    			endforeach;
    			$a_fieldSave["edicao"] = "Novo Registro:<br>".$alteracao;
    		}else{
    			//UPDATE
    			$registro = $this->find("first", array(
    					"fields" => array(
    							$this->alias.".data",
    							$this->alias.".titulo_ptbr",
    							$this->alias.".titulo_eng",
    							$this->alias.".titulo_esp",
    							$this->alias.".texto_ptbr",
    							$this->alias.".texto_eng",
    							$this->alias.".texto_esp",
    					),
    					"conditions" => array(
    							$this->alias.".id" => $this->data[$this->alias]["id"]
    					),
    			));
    			
    			$a_fieldOrigin = array(
    					"data"			=> $registro[$this->alias]["data"],
    					"titulo_ptbr"	=> $registro[$this->alias]["titulo_ptbr"],
    					"titulo_eng"	=> $registro[$this->alias]["titulo_eng"],
    					"titulo_esp"	=> $registro[$this->alias]["titulo_esp"],
    					"texto_ptbr"	=> $registro[$this->alias]["texto_ptbr"],
    					"texto_eng"		=> $registro[$this->alias]["texto_eng"],
    					"texto_esp"		=> $registro[$this->alias]["texto_esp"],
    			);
    			$a_fieldsPost = array(
    				"data"			=> $this->data[$this->alias]["data"],
    				"titulo_ptbr"	=> $this->data[$this->alias]["titulo_ptbr"],
    				"titulo_eng"	=> $this->data[$this->alias]["titulo_eng"],
    				"titulo_esp"	=> $this->data[$this->alias]["titulo_esp"],
    				"texto_ptbr"	=> $this->data[$this->alias]["texto_ptbr"],
    				"texto_eng"		=> $this->data[$this->alias]["texto_eng"],
    				"texto_esp"		=> $this->data[$this->alias]["texto_esp"],
    			);
    			
    			$diferenca = array_diff($a_fieldsPost, $a_fieldOrigin);
    			
    			
    			$a_fieldSave = array();
    			$a_fieldSave["acao"] = "Alterado";
    			$alteracao = "";
    			if( !empty($diferenca) ){
    				foreach( $diferenca as $key => $val ):
		    			switch ($key) {
		    				case "titulo_ptbr":
		    					$label = "Titulo em Português";
		    					$alteracao = $alteracao.$label." alterado de ".$registro[$this->alias]["titulo_ptbr"]. " para ".$this->data[$this->alias]["titulo_ptbr"]. "<br>";
		    					break;
		    				case "titulo_eng":
		    					$label = "Titulo em Inglês";
		    					$alteracao = $alteracao.$label." alterado de ".$registro[$this->alias]["titulo_eng"]. " para ".$this->data[$this->alias]["titulo_eng"]. "<br>";
		    					break;
		    				case "titulo_esp":
		    					$label = "Titulo em Espanhol";
		    					$alteracao = $alteracao.$label." alterado de ".$registro[$this->alias]["titulo_esp"]. " para ".$this->data[$this->alias]["titulo_esp"]. "<br>";
		    					break;
		    				case "texto_ptbr":
		    					$label = "Texto em Português";
		    					$alteracao = $alteracao.$label." alterado de ".$registro[$this->alias]["texto_ptbr"]. " para ".$this->data[$this->alias]["texto_ptbr"]. "<br>";
		    					break;
		    				case "texto_eng":
		    					$label = "Texto em Inglês";
		    					$alteracao = $alteracao.$label." alterado de ".$registro[$this->alias]["texto_eng"]. " para ".$this->data[$this->alias]["texto_eng"]. "<br>";
		    					break;
		    				case "texto_esp":
		    					$label = "Texto em Espanhol";
		    					$alteracao = $alteracao.$label." alterado de ".$registro[$this->alias]["texto_esp"]. " para ".$this->data[$this->alias]["texto_esp"]. "<br>";
		    					break;
		    				case "data":
		    					$label = "Data";
		    					$alteracao = $alteracao.$label." alterada de ".$registro[$this->alias]["data"]. " para ".$this->data[$this->alias]["data"]. "<br>";
		    					break;
		    			}
    				endforeach;
    				$a_fieldSave["edicao"] = "Campos Alterados: <br>".$alteracao;
    			}else{
    				$a_fieldSave["edicao"] = "Não Houve Alteração.";
    			}


    			$a_fieldSave["username"] = CakeSession::read('Auth.User.username');
    			$a_fieldSave["name"] = CakeSession::read('Auth.User.name');
    			$a_fieldSave["clipping_id"] = $this->data[$this->alias]["id"];
    		}
    		
			$sql = "INSERT INTO tb_clipping_historico (id, clipping_id, username, acao, edicao, created, modified) values(NULL, '{$a_fieldSave["clipping_id"]}', '{$a_fieldSave["username"]}', '{$a_fieldSave["acao"]}', '{$a_fieldSave["edicao"]}', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."') ";
			$this->query($sql);
    	}
    	
    	
    	
    	
    	
    	
    	
    	
    	
    	
    	
    	
    	
    	public function beforeDelete() {
    		parent::beforeDelete();
    		App::uses('CakeSession', 'Model/Datasource');
    		
    		$a_fieldSave["username"] = CakeSession::read('Auth.User.username');
    		$a_fieldSave["name"] = CakeSession::read('Auth.User.name');
    		$a_fieldSave["clipping_id"] = $this->id;
    		$a_fieldSave["acao"] = "Delete";
//     		$a_fieldSave["edicao"] = "Registro Deletado";
			
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
				$alteracao = $alteracao." ".$key. " => ".$val;    			

    		endforeach;
    		
    		$a_fieldSave["edicao"] = "Registro Deletado:<br>".$alteracao;
    		    		
    		$sql = "INSERT INTO tb_clipping_historico (id, clipping_id, username, acao, edicao, created, modified) values(NULL, '{$a_fieldSave["clipping_id"]}', '{$a_fieldSave["username"]}', '{$a_fieldSave["acao"]}', '{$a_fieldSave["edicao"]}', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."') ";
    		$this->query($sql);
    	}
    	
    	
    	
    	
    	
    	
    	
    	
    }
?>
