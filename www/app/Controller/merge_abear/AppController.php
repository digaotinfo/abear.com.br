<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $uses = array(
						'Configuracao', 
						'Assunto', 
						'Servico', 
						'Produto', 
						'Endereco', 
						'Intro', 
						'IntroCategoria', 
						'ImprensaVideo', 
						'GaleriaCategoria', 
						'GaleriaImagenCapa', 
						'GaleriaImagen', 
						'VideoCategoria', 
						'Video',
						'Hotsite',
					);

	public $components = array(
        'Session',
        'Cookie',
        'P28n',
        //'Security',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'index', 'action' => 'index', 'admin' => true),
            'logoutRedirect' => array('controller' => 'index', 'action' => 'index', 'admin' => true)
            //,'logoutRedirect' => array('controller' => 'index', 'action' => 'xml')
        )
    );

	function beforeFilter()
	{
	//	print_r($this);
		
		///===> ADMIN
        if(!empty($this->params['prefix']) && $this->params['prefix'] == 'admin') {
           $this->Auth->deny('*');
           $this->set('usuario_admin', $this->Auth->user());
		   $this->layout = 'admin';



		///===> FRONT-END
        } else {
			$this->Auth->allow('*');
			
			////////////////////////====>
			//////Language
			$lang = $this->Cookie->read('lang');
			if (empty($lang)):
				$this->Cookie->write('lang', 'ptbr');
				$lang = 'ptbr';
			endif;
			//echo '['. $lang .']';
			$this->set('lang', $lang);
			
			//echo '['. $lang .']';
			
			if ($this->name != 'P28n') {
				
				if($lang == 'ptbr'){
					/// Tradução de meses e dias da semana
					$meses = array(
								'January' => 'Janeiro',
								'February' => 'Fevereiro',
								'March' => 'Março',
								'April' => 'Abril',
								'May' => 'Maio',
								'June' => 'Junho',
								'July' => 'Julho',
								'August' => 'Agosto',
								'September' => 'Setembro',
								'October' => 'Outubro',
								'November' => 'Novembro',
								'December' => 'Dezembro'
								);
					$dia_semana = array(
								'Monday' => 'Segunda-feira',
								'Tuesday' => 'Terça-feira',
								'Wednesday' => 'Quarta-feira',
								'Thursday' => 'Quinta-feira',
								'Friday' => 'Sexta-feira',
								'Saturday' => 'Sábado',
								'Sunday' => 'Domingo'
								);
				}

				/// Tradução de meses e dias da semana
				if($lang == 'esp'){
					$meses = array(
								'January' => 'Enero',
								'February' => 'Febrero',
								'March' => 'Marzo',
								'April' => 'Abril',
								'May' => 'Mayo',
								'June' => 'Junio',
								'July' => 'Julio',
								'August' => 'Agosto',
								'September' => 'Septiembre',
								'October' => 'Octubre',
								'November' => 'Noviembre',
								'December' => 'Diciembre'
								);
					$dia_semana = array(
								'Monday' => 'Lunes',
								'Tuesday' => 'Martes',
								'Wednesday' => 'Miércoles',
								'Thursday' => 'Jueves',
								'Friday' => 'Viernes',
								'Saturday' => 'Sábado',
								'Sunday' => 'Domingo'
								);
				}

				/// Tradução de meses e dias da semana
				if($lang == 'eng'){
					$meses = array(
								'January' => 'January',
								'February' => 'February',
								'March' => 'March',
								'April' => 'April',
								'May' => 'May',
								'June' => 'June',
								'July' => 'July',
								'August' => 'August',
								'September' => 'September',
								'October' => 'October',
								'November' => 'November',
								'December' => 'December'
								);
					$dia_semana = array(
								'Monday' => 'Monday',
								'Tuesday' => 'Tuesday',
								'Wednesday' => 'Wednesday',
								'Thursday' => 'Thursday',
								'Friday' => 'Friday',
								'Saturday' => 'Saturday',
								'Sunday' => 'Sunday'
								);
			
					
				}

		        $this->set('meses', $meses);
				$this->set('dia_semana', $dia_semana);
			
				/////////////////////////////////////////////====>
				//CONFIGURAÇÕES
				/////////////////////////////////////////////////////////////////
				$configuracao = $this->Configuracao->find('first');
				$this->set('configuracao', $configuracao);
				////////End CONFIGURAÇÕES
				/////////////////////////////////////////////====>
				




			
				/////////////////////////////////////////////====>
				//ENDEREÇOS
				/////////////////////////////////////////////////////////////////
				$enderecos = $this->Endereco->find('all');
				$this->set('enderecos', $enderecos);
				////////End ENDEREÇOS
				/////////////////////////////////////////////====>
				
				



			
				/////////////////////////////////////////////====>
				//HOT SITES
				/////////////////////////////////////////////////////////////////
				$hotsite_urls = $this->Hotsite->find('first');
				$this->set('hotsite_urls', $hotsite_urls);
				$this->set('model_hotsite', 'Hotsite');
				////////End ENDEREÇOS
				/////////////////////////////////////////////====>
				
				
				
				
				
				/////////////////////////////////////////////====>
				////////Introdução
				$mystringD = $this->here;
				$findmeD   = 'dados-e-fatos';
				$posDados = strpos($mystringD, $findmeD);
				if($posDados){
					//$intro_DadoseFatos
				}
				
				$url = split('/', $this->params->url, -1);
				
				
				$urlIntro = '';
				if(!empty($url[0]) && !empty($url[1]) ){
					$urlIntro =$url[1];
				}
				if(!empty($url[0]) && empty($url[1])){
					$urlIntro = $url[0];
				}
					$introCat = $this->IntroCategoria->find('first', array(
																			'fields' => array(
																								'id',
																							),
																			'conditions' => array(
																									'url_amigavel_ptbr' => $urlIntro
																									)
																			));
					
					$intro = $this->Intro->find('first', array(
																'fields' => array(
																				'id',
																				'texto_'.$lang	
																					),
																'conditions' => array(
																						'intro_categoria_id' => $introCat['IntroCategoria']['id'],
																						'ativo' => 1
																						),
																));
					
					$this->set('intro', $intro);
					//print_r($this);
				////////End Introdução
				/////////////////////////////////////////////====>
				
				
				
				///////////////////////////////====>
				///////Localizar Albuns		
				$tem_galeria= false;
				$urlstr 	= $this->here;
				$videos 	= array();
				$albuns 	= array();
				$tipo_galeria = array();
				$videosDestaqueAviacao = array();
				$videosPaginate = array();
				$imagensGaleria = array();
				
				$url = split('/', $this->params->url, -1);
				
				$myurl = '';
				if(!empty($url[0]) && !empty($url[1]) ){
					$myurl =$url[1];
				}
				if(!empty($url[0]) && empty($url[1])){
					$myurl = $url[0];
				}
				
				
				
				
				
				
				$this->set('myurl', $url);
				
				/// VIDEOS
				$catVideos = $this->VideoCategoria->find('first', array(
																	'fields' => array(
																						
																						),
																	'conditions' => array(
																						'url_amigavel_ptbr' => $myurl,
																							)
																	));
				//print_r($catVideos);
				if (!empty($catVideos)) {
					$videos = $this->Video->find('all', array(
																		'fields' => array(
																							'id',
																							'video_categoria_id',
																							'titulo_'.$lang,
																							'chamada_'.$lang,
																							'video_'.$lang,
																							'destaque_aviacao',
																							'destaque_home',
																							'destaque_imprensa',
																							'url_amigavel_'.$lang,
																							),
																		'conditions' => array(
																								'video_categoria_id' => $catVideos['VideoCategoria']['id'],
																								'destaque_aviacao' 	 => 0,
																								'video_'.$lang. ' <>' => '',
																								'ativo' => 1,
																								),
																		'order' => array(
																							'id' => 'DESC'
																						)
																		));

					//print_r($videos);

					/////////////////////////////////////////////////////
					///////POR DENTRO DA AVIAÇÃO
					$mystring = $this->params->here;
					$findme   = 'por-dentro-da-aviacao';
					$pos = strpos($mystring, $findme);
					
					if ($pos > 0) {
						$videosDestaqueAviacao = $this->Video->find('all', array(
																			'fields' => array(
																								'id',
																								'video_categoria_id',
																								'titulo_'.$lang,
																								'chamada_'.$lang,
																								'video_'.$lang,
																								'destaque_aviacao',
																								'destaque_home',
																								'destaque_imprensa',
																								'url_amigavel_'.$lang,
																								),
																			'conditions' => array(
																									'video_categoria_id' => $catVideos['VideoCategoria']['id'],
																									'destaque_aviacao' 	 => 1,
																									'ativo' => 1,
																									'video_'.$lang. ' <>' => '',
																									),
																			'limit' => 2,
																			'order' => array(
																								'id' => 'DESC'
																							)
																			));
						$this->set('videosDestaqueAviacao', $videosDestaqueAviacao);
						
						//print_r($videosDestaqueAviacao);
						
						$this->paginate = array(
												'fields' => array(
																	'id',
																	'video_categoria_id',
																	'titulo_'.$lang,
																	'chamada_'.$lang,
																	'video_'.$lang,
																	'destaque_aviacao',
																	'destaque_home',
																	'destaque_imprensa',
																	'url_amigavel_'.$lang,
																	),
												'conditions' => array(
																		'video_categoria_id' => $catVideos['VideoCategoria']['id'],
																		'destaque_aviacao' 	 => 0,
																		'video_'.$lang. ' <>' => '',
																		'ativo' => 1,
																		),
												'limit' => 4
													);
						$videosPaginate = $this->paginate('Video');
						//print_r($videos);
						//print_r($videosPaginate);
					} 
					
				}
				
				/////////////////////////////////////////////////////////////////////////////////////////
				/////////////////////////////////////////////////////////////////////////////////////////
				//////////////DADOS E FATOS URL
				
				
				
				$url_Dados = split('/', $this->params->url, -1);
				$url_dadosefatos = array();
				
				if($this->params->url == 'dados-e-fatos'){
					$url_dadosefatos = 'dados-e-fatos';
				}
				if(!empty($url_Dados[0]) && !empty($url_Dados[1]) ){
					$url_dadosefatos = $url_Dados[1];
				}
				
				$this->set('url_dadosefatos', $url_dadosefatos);
			
				
				
				
				
				/////////////////////////////////////////////////////////////////////////////////////////
				/////////////////////////////////////////////////////////////////////////////////////////
				////////////// FOTOS
				$mystring = $this->params->here;
				$findme   = 'dados-e-fatos';
				$pos = strpos($mystring, $findme);
				
				if ($pos > 0) {
					$cat = $this->GaleriaCategoria->find('first', array(
												'fields' => array(),
												'conditions' => array(
																	'url_amigavel_ptbr' => $findme
																		)
												));
						
					if (!empty($cat)) {
						$albuns = $this->GaleriaImagenCapa->find('all', array(
																			'fields' => array(
																								'id',
																								'galeria_categoria_id',
																								'titulo_'.$lang,
																								'descricao_'.$lang,
																								'img_file',
																								'img_th_hidden',
																								'url_amigavel_'.$lang,
																								),
																			'conditions' => array(
																									'galeria_categoria_id' => $cat['GaleriaCategoria']['id'],
																									'descricao_'.$lang. ' <>' => '',
																									'ativo' => 1,
																									),
																			));
						
						if(count($albuns) == 1){
							$imagensGaleria = $this->GaleriaImagen->find('all', array(
																						'fields' => array(
																											'id',
																											'img_file',
																											'titulo_'.$lang,
																											'descricao_'.$lang,
																											),
																						'conditions' => array(
																												'galeria_imagen_capa_id' => $albuns[0]['GaleriaImagenCapa']['id'],
																											),
																						));
							
						}
					}
				}
				//////////////END DADOS E FATOS URL
				/////////////////////////////////////////////////////////////////////////////////////////
				/////////////////////////////////////////////////////////////////////////////////////////
	    		$cat = $this->GaleriaCategoria->find('first', array(
												'fields' => array(),
												'conditions' => array(
																	'url_amigavel_ptbr' => $myurl
																		)
												));												
									
				if (!empty($cat)) {
					$albuns = $this->GaleriaImagenCapa->find('all', array(
																		'fields' => array(
																							'id',
																							'galeria_categoria_id',
																							'titulo_'.$lang,
																							'descricao_'.$lang,
																							'img_file',
																							'img_th_hidden',
																							'url_amigavel_'.$lang,
																							),
																		'conditions' => array(
																								'galeria_categoria_id' => $cat['GaleriaCategoria']['id'],
																								'descricao_'.$lang. ' <>' => '',
																								'ativo' => 1,
																								),
																		));
					//print_r($albuns);																			
					if(count($albuns) == 1){
						$imagensGaleria = $this->GaleriaImagen->find('all', array(
																					'fields' => array(
																										'id',
																										'img_file',
																										'titulo_'.$lang,
																										'descricao_'.$lang,
																										),
																					'conditions' => array(
																											'galeria_imagen_capa_id' => $albuns[0]['GaleriaImagenCapa']['id'],
																										),
																					));
					}
				}
																	
				if (!empty($albuns) || !empty($videos)) {
					$tem_galeria = true;
					
					$tipo_galeria = '';
					if(count($videos) == 1 && count($albuns) == 0  || count($videos) != 0 && count($albuns) == 0){
						$tipo_galeria = 'galeria-video';	
					}
					if(count($videos) == 0 && count($albuns) == 1 ){
					
						$tipo_galeria = 'galeria-foto-unica';	
					}
					if(count($videos) != 0 && count($albuns) != 0 ){
					
						$tipo_galeria = 'galeria-videos-fotos';	
					}		
					
					if(count($videos) == 0 && count($albuns) > 1 ){
						$tipo_galeria = 'galeria-fotos';	
					}
				}
				
				$this->set(array(
							'tem_galeria' 		=> $tem_galeria,
							'videosPaginate' 	=> $videosPaginate,
							'videos' 			=> $videos,
							'catVideos' 		=> $catVideos,
							'albuns' 			=> $albuns,
							'tipo_galeria' 		=> $tipo_galeria,
							'imagensGaleria' => $imagensGaleria,
						));
				////////////Localizar Albuns
				///////////////////////////////
				
			}

        }

	}

	public function configuracoesGerais($fields = null) {
		$parametros = array();
		if ($fields != null):
			$parametros = array(
				'fields' => $fields,

			);
		endif;

		return $this->Configuracao->find('first', $parametros);
	}

	public function sendMail($assunto, $mensagem, $email_para = null, $email_cc=null) {
		$dados_envio = $this->configuracoesGerais(array(
													'email_destinatario',
													'email_cc', 
													'email_remetente_host', 
													'email_remetente', 
													'email_remetente_senha',
												));
		
		
	
		//DADOS SMTP
		if (!empty($dados_envio)):
			$smtp 		= $dados_envio['Configuracao']['email_remetente_host'];
			$usuario 	= $dados_envio['Configuracao']['email_remetente'];
			$senha 		= $dados_envio['Configuracao']['email_remetente_senha'];
			
			if ($email_para == null):
				$email_para = $dados_envio['Configuracao']['email_destinatario'];
				
			endif;
			
			if($email_cc == null){
				$email_cc = $dados_envio['Configuracao']['email_cc'];
			};
			
			
		else:
			$smtp 		= "smtp.zoio.net.br";
			$usuario 	= "tester@zoio.net.br";
			$senha 		= "zoio2010";
			
			if ($email_para == null):
				$email_para = 'zoiodev@zoio.net.br';
			endif;
		endif;
		
		$email_de = $usuario;

		
	
		require_once './smtp/smtp.php';
	
		$mail = new SMTP;
		$mail->Delivery('relay');
		$mail->Relay($smtp, $usuario, $senha, 587, 'login', false);
		//$mail->addheader('content-type', 'text/html; charset=utf-8');
		//$mail->addheader('content-type', 'text/html; charset=iso-8859-1');
		$mail->TimeOut(10);
		$mail->Priority('normal');
		$mail->From($email_de);
		$mail->AddTo($email_para);
		$mail->AddCc($email_cc);
		//$mail->AddBcc('zoiodev@zoio.net.br');
		
		$mail->Html($mensagem);

		if($mail->Send($assunto)){
			//echo '_SMTP+_Enviou para g......@zoio.net.br';
			return true;
			
		} else {
			//echo '_SMTP+_Não enviou e-mail';
			return false;
			
		}
		
		
	}
		
	public function sendMailDePara($assunto, $mensagem, $email_para = null, $email_cc=null, $email_replay=null) {
		$dados_envio = $this->configuracoesGerais(array(
													'email_destinatario',
													'email_cc', 
													'email_remetente_host', 
													'email_remetente', 
													'email_remetente_senha',
												));
		
		//DADOS SMTP
		if (!empty($dados_envio)):
			$smtp 		= $dados_envio['Configuracao']['email_remetente_host'];
			$usuario 	= $dados_envio['Configuracao']['email_remetente'];
			$senha 		= $dados_envio['Configuracao']['email_remetente_senha'];
			
			if ($email_para == null):
				$email_para = $dados_envio['Configuracao']['email_destinatario'];
				
			endif;
			
			if($email_cc == null){
				$email_cc = $dados_envio['Configuracao']['email_cc'];
			};
			
			
		else:
			$smtp 		= "smtp.zoio.net.br";
			$usuario 	= "tester@zoio.net.br";
			$senha 		= "zoio2010";
			
			if ($email_para == null):
				$email_para = 'zoiodev@zoio.net.br';
			endif;
		endif;
		
		$email_de = $usuario;

		
	
		require_once './smtp/smtp.php';
	
		$mail = new SMTP;
		$mail->Delivery('relay');
		$mail->Relay($smtp, $usuario, $senha, 587, 'login', false);
		if ($email_replay != null) {
			$mail->AddHeader('Reply-To', $email_replay);
		}
		
		//$mail->addheader('content-type', 'text/html; charset=utf-8');
		//$mail->addheader('content-type', 'text/html; charset=iso-8859-1');
		$mail->TimeOut(10);
		$mail->Priority('normal');
		$mail->From($email_de);
		$mail->AddTo($email_para);
		$mail->AddCc($email_cc);
		//$mail->AddBcc('zoiodev@zoio.net.br');
		
		$mail->Html($mensagem);

		if($mail->Send($assunto)){
			//echo '_SMTP+_Enviou para g......@zoio.net.br';
			return true;
			
		} else {
			//echo '_SMTP+_Não enviou e-mail';
			return false;
			
		}
		
		
	}
	
	public function resizeImage($dir, $toResize, $maxW=750, $maxH=540, $force=false) {
		$imagemToResize = $dir.$toResize;
		$ext = ".".end(explode(".", $toResize));
		$error = '';

		if(!$maxH && !$maxW) {
			return true;
		}

		$largura_alvo = $maxW;
		$altura_alvo  = $maxH;

		if($maxW <= $largura_alvo && $maxH <= $altura_alvo && $force=false) {
			return true;
		}

		$file_dimensions = getimagesize($dir.$toResize);
		$fileType = strtolower($file_dimensions['mime']);

		if($fileType=='image/jpeg' || $fileType=='image/jpg' || $fileType=='image/pjpeg') {
			$img = imagecreatefromjpeg($imagemToResize);
		} else if($fileType=='image/png') {
			$img = imagecreatefrompng($imagemToResize);
		} else if($fileType=='image/gif') {
			$img = imagecreatefromgif($imagemToResize);
		}

	   $largura_original = imagesX($img);
	   $altura_original = imagesY($img);

	   $altura_nova = ($altura_original * $largura_alvo)/$largura_original;

	   if($altura_nova>$altura_alvo)
	   {
	      $altura_nova = $altura_alvo;
	      $largura_nova = round(($largura_original * $altura_alvo)/$altura_original);
	      $nova = ImageCreateTrueColor($largura_nova,$altura_alvo);

		  if($fileType=='image/png' || $fileType=='image/gif') {
			  imagealphablending($nova, false);
			  imagesavealpha($nova,true);
			  $transparent = imagecolorallocatealpha($nova, 255, 255, 255, 127);
			  imagefilledrectangle($nova, 0, 0, $largura_nova, $altura_nova, $transparent);
		  }

	      imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura_nova, $altura_nova, $largura_original,  $altura_original);
	   }
	   else
	   {
	      $largura_nova = $largura_alvo;
	      $nova = ImageCreateTrueColor($largura_alvo,$altura_nova);

		  if($fileType=='image/png' || $fileType=='image/gif') {
			  imagealphablending($nova, false);
			  imagesavealpha($nova,true);
			  $transparent = imagecolorallocatealpha($nova, 255, 255, 255, 127);
			  imagefilledrectangle($nova, 0, 0, $largura_alvo, $altura_nova, $transparent);
		  }

	      imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura_alvo, $altura_nova, $largura_original,  $altura_original);
	   }

	   if($force) {
	      $nova = ImageCreateTrueColor($maxW,$maxH);
	      imagecopyresampled($nova, $img, 0, 0, 0, 0, $maxW, $maxH, $largura_original,  $altura_original);
	   }

		if($fileType=='image/jpeg' || $fileType=='image/jpg' || $fileType=='image/pjpeg') {
			if(!imagejpeg($nova, $imagemToResize,100)) $error = true;
		} else if($fileType=='image/png') {
			if(!imagepng($nova, $imagemToResize,0)) $error = true;
		} else if($fileType=='image/gif') {
			if(!imagegif($nova, $imagemToResize)) $error = true;
		}

		if($error) {
			return 'Erro ao redimencionar '.$toResize;
		} else {
			return true;
		}

	}



	/**
	*
	*       uploadFile()
	*       Alexandre MBroetto - 03-10-2011
	*
	*       $dir   -> Diretório de Destino do arquivo
	*       $file  -> Arquivo
	*       $ext   -> Extensões permitidas para esse arquivo. (Array)
	*       $force -> Se TRUE, força a existência de um arquivo.
	*       $resize-> Chama a funcao resizeImage() se passado como array
	*       $fileName -> Se TRUE, impõe um novo nome ao arquivo.
	*       $toLower -> Se TRUE, força o nome do arquivo a ser minusculo.
	*
	*/
	public function uploadFile($dir, $file, $ext="", $resize=false, $force=false, $fileName="", $createDir = false, $action='', $toLower=true, $createThumb=false) {
	   $extValid = true;
	   $error = false;
	   $errorLine = '';
	   $thumbName = '';
	   $thumbDir = '';

		//die('aaa'.$force);
		//die($file['name']);
		
		if(!is_dir($dir)) {
			if($createDir) {
				mkdir($dir);
			} else {
				$error = true;
				$errorLine = 'Diretorio nao encontrado!';
			}
		} else {
			if($file['name']=='' && !$force) {
				return array(true, '');
			}
		}
		if(!is_dir($dir) && !$force) {die('Diretório não encontrado');}
		
		/*if(!is_dir($dir) && $createDir) {
			mkdir($dir);
		} else if(!is_dir($dir) && !$createDir){
			$error = true;
			$errorLine = 'Diretorio nao encontrado!';
		}*/
		
		/*print_r($file);
		$is_uploaded = is_uploaded_file($file['tmp_name']);
		$success = move_uploaded_file($file['tmp_name'], $dir);
		
		echo $is_uploaded;
		
		if($success) {
			return 'upload';
		} else {
			return 'bosta';
		}*/
		
	   //if($file['size'] <= 5000000) {
	      if($toLower)
	         $fileExt = strToLower(end(explode(".", $file['name'])));
	      else
	         $fileExt = end(explode(".", $file['name']));

	      if($ext) $extValid = in_array($fileExt, $ext);
	
			if($file['name'] && $extValid) {
			
	         $fileTemp = $file['tmp_name'];

	         if($fileName) {
	            $filename = $fileName;
	         } else {
	            if($toLower) $filename = strToLower($file['name']);
	            else         $filename = $file['name'];
	         }
	
			 if(file_exists($dir.$filename)) {
				$fileNameExt = explode('.', $filename);
				$fileExtension = end(explode('.', $filename));
				$newFileName = '';
				
				for($x=0; $x<count($fileNameExt)-1; $x++) {
					$newFileName .= $fileNameExt[$x].'.';
				}
				
				$newFileName = subStr($newFileName, 0, -1);
				
				$filename = $newFileName.'_'.date('dmyHis').'.'.$fileExtension;
			}

			$filename = str_Replace(' ','_',$filename);

			if(!is_uploaded_file($fileTemp)) {
	            $error = true;
	            $errorLine .= "001 Erro ao efetuar upload do arquivo: ".$file["name"]."\n";
	         } else {
	            if(!move_uploaded_file($fileTemp, $dir.$filename)) {
					$error=false;
					$errorLine .= "002 Erro ao efetuar upload do arquivo: {$file[name]}";
				} else {
					
					if($createThumb) {
						
						$thumbDir = $dir.'thumbs/';
						$thumbName = 'th_'.$filename;
						
						if(!is_dir($thumbDir)) {
							mkdir($thumbDir);
						}
						
						
						if(!copy($dir.$filename, $thumbDir.$thumbName)) {
							$error = false;
							$errorLine .= "003 Erro ao criar Thumb: {$filename}";
						} else {
							if($resize['w']!=0 && $resize['h']!=0) {
								$this->resizeImage($thumbDir, $thumbName, $createThumb['width'], $createThumb['height'], true);
							}
						}
					}
					
					
					
				}
	         }
	      } else if($force) {
	         $error = true;
	         $errorLine = "Arquivo para upload nao identificado.";
	      }
	   //} else {
	   //   $error = false;
	   //   $errorLine = "Arquivo excede o tamanho máximo de 10MB";
	   //}
		
		
		if($ext && !$extValid && $file['name']!='') {
			$errorLine = 'Extensao de arquivo nao permitida.';
		}
		
		if($errorLine) {
			$return = array(false, $errorLine);
		} else {
			$return = array(true, $dir.$filename, $thumbDir.$thumbName);
		}

		if(!$error && isSet($resize)) {
			
			if($resize['w']!=0 && $resize['h']!=0) {
				$resizeImage = $this->resizeImage($dir, $filename, $resize['w'], $resize['h'], $resize['force']);
			}
			
			if (!empty($resizeImage)) {
				if($resizeImage!=1) echo $resizeImage;
			}
		}

	   return $return;
	}

	public function getZoioConfig() {
		$zoioConfig = file_get_contents('config/config.zoio');

		return $zoioConfig;
	}

	function limpaTags($limpar) {

        if(is_array($limpar)) {
        	$str = '';

        	for($x=0; $x<count($limpar); $x++) {
        		$str .= ($limpar[$x]!='') ? $limpar[$x].' ' : '';
        	}

        	$str = strip_Tags(str_Replace(" ", ", ", subStr($str, 0, -1)));
        }

        return $str;

    }


    function stringToSlug($str) {

		$array1 = array(   "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç"
				 , "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç" );

		$array2 = array(   "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c"
				 , "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C" );

		$str = str_replace( $array1, $array2, $str );


		/*
		/// ERRO DE CARACTERES NESTA FUNÇÃO //////////////
		//////////////////////////////////////////////////
			$as = array("Ã¡", "Ã£", "Ã ", "Ã¢", "Ã¤","Ã", "Ã", "Ã", "Ã", "Ã");
			$str = str_replace($as, "a", $str);

			$es = array("Ã©", "Ãª", "Ã¨", "Ã«","Ã", "Ã", "Ã", "Ã");
			$str = str_replace($es, "e", $str);

			$is = array("Ã­", "Ã®", "Ã¬", "Ã¯", "Ã", "Ã", "Ã", "Ã");
			$str = str_replace($is, "i", $str);

			$os = array("Ã³", "Ã²", "Ã´", "Ã¶", "Ãµ", "Ã", "Ã", "Ã", "Ã", "Ã");
			$str = str_replace($os,"o", $str);

			$us = array("Ãº", "Ã»", "Ã¹", "Ã¼", "Ã", "Ã", "Ã", "Ã");
			$str = str_replace($us,"u", $str);

			$ns = array("Ã±", "Ã");
			$str = str_replace($ns, "n", $str);

			$cs = array("Ã§", "Ã");
			$str = str_replace($cs, "c", $str);
		*/

		$str = strtolower(trim($str));
		//$str = strtr($str, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_");
		$str = ereg_replace("[^a-zA-Z0-9_]", "-", $str);
		$str = preg_replace('/[^a-z0-9-]/', '-', $str);
		$str = preg_replace('/-+/', "-", $str);
		return $str;
    }



	function paginacao($curPage, $numeroDePaginas, $controller, $action = 'index', $addClass = 'paginacaoMargin') {
		$paginacao = "";

		$curPageStyle = 'color:#9ACA3C;border:0px solid #004b7f;';

		$paginacao = ($curPage==1) ? '' : '<a href="'.$this->webroot.$controller.'/'.$action.'" class="'.$addClass.'" rel="1" style="border:0;">Primeira</a>';

		if($numeroDePaginas>5) {
        	$pageMin = ($curPage<=2) ? 1 : ($curPage-2);
        	$pageMax = ($curPage+2);

        	if(($curPage+1) == $numeroDePaginas || $curPage == $numeroDePaginas) {
        		$pageMax = $numeroDePaginas;
        	}

        	for($x=$pageMin; $x<=$pageMax; $x++) {
				$style = '';

				if($x==$curPage) $style=$curPageStyle;

					$y = ($x==1) ? '' : $x;
					$paginacao .= '<a href="'.$this->webroot.$controller.'/'.$action.'/'.$y.'" style="'.$style.'" class="'.$addClass.'" rel="'.$y.'">'.$x.'</a>';
        	}
		} else {
			for($x=1; $x<=$numeroDePaginas; $x++) {
				$style = '';

				if($x==$curPage) $style=$curPageStyle;

				$y = ($x==1) ? '' : $x;
				$paginacao .= '<a href="'.$this->webroot.$controller.'/'.$action.'/'.$y.'" class="'.$addClass.'" style="'.$style.'" rel="'.$y.'">'.$x.'</a>';
			}
		}

		//$paginacao .= ($curPage!=$numeroDePaginas) ? '<a href="'.$this->webroot.$controller.'/'.$action.'/'.$numeroDePaginas.'" class="'.$addClass.'" rel="'.$numeroDePaginas.'">Última</a>' : '';
		$paginacao .= ($curPage!=$numeroDePaginas) ? '<a href="'.$this->webroot.$controller.'/'.$action.'/'.$numeroDePaginas.'" class="'.$addClass.'" rel="'.$numeroDePaginas.'" style="border:0;">Última</a>' : '';

		if($numeroDePaginas==0) $paginacao = "";

		return $paginacao;
    }

	
	public function validaEmail($email) {
		$conta = "^[a-zA-Z0-9\._-]+@";
		$domino = "[a-zA-Z0-9\._-]+.";
		$extensao = "([a-zA-Z]{2,4})$";
		
		$pattern = $conta.$domino.$extensao;
		
		if (ereg($pattern, $email)):
			return true;
		else:
			return false;
		endif;
	}
}
