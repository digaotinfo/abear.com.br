<?php
App::uses('Controller', 'Controller');

class UpdatesController extends AppController {
    var $name 		= "Updates";
    public $helpers = array('Html', 'Session', 'Form', 'Time', 'Text', 'Paginator');
    public $uses 	= array('Update', 'Dadosefato', 'GaleriaImagenCapa');
    var $scaffold 	= 'admin';
    
  	function index(){
  		$model = 'Dadosefato';

  		$registros = $this->Update->find('all');

 		foreach($registros as $registro){
 			$this->request->data[$model]['id'] = $registro['Update']['id'];
 			$this->request->data[$model]['dadosefatotipo_id'] = $registro['Update']['dadosefatotipo_id'];
 			$this->request->data[$model]['titulo_ptbr'] = $registro['Update']['titulo_ptbr'];
 			$this->request->data[$model]['titulo_eng'] = $registro['Update']['titulo_eng'];
 			$this->request->data[$model]['titulo_esp'] = $registro['Update']['titulo_esp'];
 			$this->request->data[$model]['chamada_ptbr'] = $registro['Update']['texto_1_ptbr'].$registro['Update']['texto_2_ptbr'];
 			$this->request->data[$model]['chamada_eng'] = $registro['Update']['texto_1_eng'].$registro['Update']['texto_2_eng'];
 			$this->request->data[$model]['chamada_esp'] = $registro['Update']['texto_1_esp'].$registro['Update']['texto_2_esp'];
 			

 			// >>> imagens
 			$this->request->data[$model]['titulo_da_imagem_1_ptbr'] = $registro['Update']['descricao_da_imagem_1_ptbr'];
 			$this->request->data[$model]['titulo_da_imagem_1_eng'] = $registro['Update']['descricao_da_imagem_1_eng'];
 			$this->request->data[$model]['titulo_da_imagem_1_esp'] = $registro['Update']['descricao_da_imagem_1_esp'];
 			$this->request->data[$model]['titulo_da_imagem_2_ptbr'] = $registro['Update']['descricao_da_imagem_2_ptbr'];
 			$this->request->data[$model]['titulo_da_imagem_2_eng'] = $registro['Update']['descricao_da_imagem_2_eng'];
 			$this->request->data[$model]['titulo_da_imagem_2_esp'] = $registro['Update']['descricao_da_imagem_2_esp'];
 			$this->request->data[$model]['titulo_da_imagem_3_ptbr'] = $registro['Update']['descricao_da_imagem_3_ptbr'];
 			$this->request->data[$model]['titulo_da_imagem_3_eng'] = $registro['Update']['descricao_da_imagem_3_eng'];
 			$this->request->data[$model]['titulo_da_imagem_3_esp'] = $registro['Update']['descricao_da_imagem_3_esp'];

 			$this->request->data[$model]['imagem_1_ptbr_file'] = $registro['Update']['imagem_1_ptbr_file'];
 			$this->request->data[$model]['imagem_1_ptbr_th_hidden'] = $registro['Update']['imagem_1_ptbr_th_hidden'];
 			$this->request->data[$model]['imagem_2_ptbr_file'] = $registro['Update']['imagem_2_ptbr_file'];
 			$this->request->data[$model]['imagem_2_ptbr_th_hidden'] = $registro['Update']['imagem_2_ptbr_th_hidden'];
 			$this->request->data[$model]['imagem_3_ptbr_file'] = $registro['Update']['imagem_3_ptbr_file'];
 			$this->request->data[$model]['imagem_3_ptbr_th_hidden'] = $registro['Update']['imagem_3_ptbr_th_hidden'];
 			
 			$this->request->data[$model]['imagem_1_eng_file'] = $registro['Update']['imagem_1_eng_file'];
 			$this->request->data[$model]['imagem_1_eng_th_hidden'] = $registro['Update']['imagem_1_eng_th_hidden'];
 			$this->request->data[$model]['imagem_2_eng_file'] = $registro['Update']['imagem_2_eng_file'];
 			$this->request->data[$model]['imagem_2_eng_th_hidden'] = $registro['Update']['imagem_2_eng_th_hidden'];
 			$this->request->data[$model]['imagem_3_eng_file'] = $registro['Update']['imagem_3_eng_file'];
 			$this->request->data[$model]['imagem_3_eng_th_hidden'] = $registro['Update']['imagem_3_eng_th_hidden'];

 			$this->request->data[$model]['imagem_1_esp_file'] = $registro['Update']['imagem_1_esp_file'];
 			$this->request->data[$model]['imagem_1_esp_th_hidden'] = $registro['Update']['imagem_1_esp_th_hidden'];
 			$this->request->data[$model]['imagem_2_esp_file'] = $registro['Update']['imagem_2_esp_file'];
 			$this->request->data[$model]['imagem_2_esp_th_hidden'] = $registro['Update']['imagem_2_esp_th_hidden'];
 			$this->request->data[$model]['imagem_3_esp_file'] = $registro['Update']['imagem_3_esp_file'];
 			$this->request->data[$model]['imagem_3_esp_th_hidden'] = $registro['Update']['imagem_3_esp_th_hidden'];

 			$this->request->data[$model]['descricao_da_imagem_1_ptbr'] = $registro['Update']['descricao_da_imagem_1_ptbr'];
 			$this->request->data[$model]['descricao_da_imagem_1_eng'] = $registro['Update']['descricao_da_imagem_1_eng'];
 			$this->request->data[$model]['descricao_da_imagem_1_esp'] = $registro['Update']['descricao_da_imagem_1_esp'];
 			$this->request->data[$model]['descricao_da_imagem_2_ptbr'] = $registro['Update']['descricao_da_imagem_2_ptbr'];
 			$this->request->data[$model]['descricao_da_imagem_2_eng'] = $registro['Update']['descricao_da_imagem_2_eng'];
 			$this->request->data[$model]['descricao_da_imagem_2_esp'] = $registro['Update']['descricao_da_imagem_2_esp'];
 			$this->request->data[$model]['descricao_da_imagem_3_ptbr'] = $registro['Update']['descricao_da_imagem_3_ptbr'];
 			$this->request->data[$model]['descricao_da_imagem_3_eng'] = $registro['Update']['descricao_da_imagem_3_eng'];
 			$this->request->data[$model]['descricao_da_imagem_3_esp'] = $registro['Update']['descricao_da_imagem_3_esp'];
 			// <<< imagens

 			$this->request->data[$model]['ativo'] = $registro['Update']['ativo'];
 			$this->request->data[$model]['importante'] = $registro['Update']['importante'];
 			$this->request->data[$model]['tags_ptbr_hidden'] = $registro['Update']['tags_ptbr'];
 			$this->request->data[$model]['tags_eng_hidden'] = $registro['Update']['tags_eng'];
 			$this->request->data[$model]['tags_esp_hidden'] = $registro['Update']['tags_esp'];

 			$this->request->data[$model]['url_amigavel_ptbr'] = $this->stringToSlug($registro['Update']['titulo_ptbr']);
 			$this->request->data[$model]['url_amigavel_eng'] = $this->stringToSlug($registro['Update']['titulo_eng']);
 			$this->request->data[$model]['url_amigavel_esp'] = $this->stringToSlug($registro['Update']['titulo_esp']);
 		
 			$this->request->data[$model]['created'] = $registro['Update']['created'];
 			$this->request->data[$model]['modified'] = $registro['Update']['modified'];

 			$this->$model->save($this->request->data);
 		}

  	}
}
