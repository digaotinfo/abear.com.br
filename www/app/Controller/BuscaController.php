<?php
App::uses('Controller', 'Controller');

class BuscaController extends AppController {
    var $name 		= "Busca";
    public $helpers = array('Html', 'Session', 'Form');
    public $uses = array('Busca');
    var $paginate = array(
                        'limit' => 10,
                    );

    
    
    function beforeFilter() {
        parent::beforeFilter();
    }


    public function index($busca = '')
    {
        if($busca == '')
        {
            $this->redirect('/');
            return;
        }

        $lang = $this->Cookie->read('lang');

        $this->set('busca', $busca);

        $this->paginate['recursive'] = 0;
        $this->paginate['fields'] = array(
                                            'titulo_'.$lang,
                                            'chamada_'.$lang,
                                            'url_'.$lang,
                                            'tipo',
                                        );
        /*
        $this->paginate['conditions'] = array(
                                                'MATCH (titulo_'.$lang.', chamada_'.$lang.', texto_'.$lang.', tags_'.$lang.') 
                                                AGAINST ("'.$busca.'")
                                                '
                                            );
        */
        
        $this->paginate['conditions'] = array(
                                            'or' => array(
                                                        'titulo_'.$lang.' LIKE' => '%'.$busca.'%',
                                                        'chamada_'.$lang.' LIKE' => '%'.$busca.'%',
                                                        'texto_'.$lang.' LIKE' => '%'.$busca.'%',
                                                        'tags_'.$lang.' LIKE' => '%'.$busca.'%'
                                                     ),
                                            'and' => array(
                                                        'titulo_'.$lang. ' <>'  => '',
                                                    )
                                        );
        
        $this->paginate['order'] = 'tipo ASC';
        $registros = $this->paginate("Busca");
        
        $this->set('registros', $registros);

    }


}
