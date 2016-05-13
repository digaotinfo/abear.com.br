<?php
/*
App::uses('Controller', 'Controller');

class FundadorsController extends AppController {
    var $name 		= "Fundadors";
    public $helpers = array('Html', 'Session', 'Form');
    var $uses		= array('Texto', 'Fundador');
    var $scaffold 	= 'admin';

    public function index(){
        $model = 'Associado';
        $this->set('model', $model);
        $lang = $this->Cookie->read('lang');

        $introFind = $this->Texto->findAllByController('Associados', array(
                                                                        'intro_'. $lang,
                                                                        'imagem_file',
                                                                        'tags_'. $lang,
                                                                        'texto_'. $lang,

                                                                    ));

        if(count($introFind)>0) {
            $this->set('intro', $introFind[0]['Texto']['intro_'. $lang]);
        } else {
            $this->set('intro', '');
        }

        $this->set('fundadores', $this->Associado->find('all', array(
                                                                'conditions' => array(
                                                                    'Associado.publicar_em_'. $lang => 1,
                                                                    'Associado.associadocategoria_id' => 1,
                                                                ),
                                                                'order' => 'Associadocategoria.id ASC, Associado.order ASC, Associado.nome ASC'
                                                            )
                                                        )
                );

        $this->set('associados', $this->Associado->find('all', array(
                                                                'conditions' => array(
                                                                    'Associado.publicar_em_'. $lang => 1,
                                                                    'Associado.associadocategoria_id' => 5,
                                                                ),
                                                                'order' => 'Associadocategoria.id ASC, Associado.order ASC, Associado.nome ASC'
                                                            )
                                                        )
                );

        $this->set('lang', $lang);
    }

}
*/
