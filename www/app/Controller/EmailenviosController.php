<?

class EmailenviosController extends AppController{
	var $name = "Emailenvios";
	public $helpers = array('Html', 'Session', 'Form');
	public $uses = array('Configuracao', 'Newsletter');
	//var $scaffold = 'admin';
	//var $transformUrl = array('url_amigavel' => 'titulo_ptbr');
	
	
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	
	public function enviarcontato(){
	//echo 'enviarcontato()';
	//die();
		//////////////////////////////
		///////////////////salva no BD
		$model = 'Newsletter';
		$this->set('model', $model);
	
		if($this->request->data[$model]['receber_news'] == 1){
			$this->$model->set($this->request->data);
			if($this->$model->validates()){
	            if ($this->$model->save($this->request->data[$model])){
	                //echo 'foi salvo!';

	                
	            }
            }	
		}
		////////////////// /salva no BD
		//////////////////////////////

		$this->layout = 'ajax';
		$this->autoRender = false;	
		
		$configuracao = $this->Configuracao->find('first', array('fields' => array('email_destinatario')));		                             
                           
		$serialize		= $this->request->data['Newsletter'];
		
		$s_nome 		= $serialize['nome'];
		$s_email 		= $serialize['email'];
		$s_veiculo 		= $serialize['veiculo'];
		$s_tel 			= $serialize['tel'];
		$s_cidade 		= $serialize['cidade'];
		$s_msg 			= $serialize['mensagem'];
      
      
        $email_body = '';
		$email_body .= '<strong>Nome: </strong> '.$s_nome. '<br/>'; 
		$email_body .= '<strong>E-Mail: </strong> '.$s_email. '<br/>'; 
		$email_body .= '<strong>Veículo/Empresa: </strong> '.$s_veiculo. '<br/>';
		if( $s_tel != ''){
			$email_body .= '<strong>Telefone: </strong> '.$s_tel. '<br/>'; 
		}
		$email_body .= '<strong>Cidade: </strong> '.$s_cidade. '<br/>';
		$email_body .= '<br/>'; 
		$email_body .= '<strong>Mensagem: </strong> '.nl2br($s_msg); 
		 
		$enviado = $this->sendMail(
                               'ABEAR - CONTATO', 
                               $email_body,
                               $configuracao['Configuracao']['email_destinatario']
                               );
	     
		
        if($enviado == 0){
            echo 'false';
        } else {
            echo 'true';
        }
		
		
		
   }	    
	public function enviarDePara(){
		$this->layout = 'ajax';
		$this->autoRender = false;
		
		//echo 'xgo';
		//die();
		
		$configuracao = $this->Configuracao->find('first', array('fields' => array('email_destinatario'/*, 'email_cc'*/)));
		//print_r($configuracao);
		//die();
               
                
		$serialize		= $this->request->data;
		
		$s_nomeR 		= $serialize['nameR'];
		$s_emailR 		= $serialize['emailR'];
		$s_nomeD 		= $serialize['nameD'];
		$s_emailD 		= $serialize['emailD'];
		//$s_assunto 		= $serialize['assunto'];
		$s_mensagem 	= $serialize['msg_mail'];
		
                
              
                
        $email_body = '';
		
		$email_body .= '<strong>Nome Remetente: </strong> '.$s_nomeR; 
		$email_body .= '<br/>'; 
		$email_body .= '<strong>E-Mail Remetente: </strong> '.$s_emailR; 
		$email_body .= '<br/>';
		$email_body .= '<br/>';
		$email_body .= '<strong>Nome Destinatario: </strong> '.$s_nomeD; 
		$email_body .= '<br/>'; 
		$email_body .= '<strong>E-Mail Destinatario: </strong> '.$s_emailD; 

		
		$email_body .= '<br/><br/>'; 
		$email_body .= '<strong>Mensagem: </strong> '.nl2br($s_mensagem); 
		 
		
		 
/*
		$enviado = $this->sendMail(
	                                'ABEAR - teste de: para', 
	                                $email_body,
	                                $configuracao['Configuracao']['email_destinatario']
	                                );
*/
	    
	   
		 $enviado = $this->sendMailDePara(
                                        'ABEAR - teste de: para', 
                                        $email_body,
                                        $s_emailD,
                                        null,
                                        $s_emailR
                                    );
	    
        if($enviado == 0){
            echo 'false';
        } else {
            echo 'true';
        }
		 
		
		
	}
}