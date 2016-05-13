<?php
// print_r($type['NewslettersEditableType']['html']);
?>
<html>
    <head>
        <?php
            // >>> atualizar data
            $data = date('D');
            $mes = date('M');
            $dia = date('d');
            $ano = date('Y');

            $semana = array(
                        'Sun'=>'DOMINGO',
                        'Mon'=>'SEGUNDA-FEIRA',
                        'Tue'=>'TERÇA-FEIRA',
                        'Wed'=>'QUARTA-FEIRA',
                        'Thu'=>'QUINTA-FEIRA',
                        'Fri'=>'SEXTA-FEIRA',
                        'Sat'=>'SÁBADO'
                        );

            $mes_extenso = array(
                                'Jan'=>'JANEIRO',
                                'Feb'=>'FEVEREIRO',
                                'Mar'=>'MARÇO',
                                'Apr'=>'ABRIL',
                                'May'=>'MAIO',
                                'Jun'=>'JUNHO',
                                'Jul'=>'JUSLHO',
                                'Aug'=>'AGOSTO',
                                'Nov'=>'NOVEMBRO',
                                'Sep'=>'SETEMBRO',
                                'Oct'=>'OUTUBRO',
                                'Dec'=>'DEZEMBRO'
                            );
            $find = "{DATA}";
            $subDate =  $semana["$data"].", <b>{$dia} de ".$mes_extenso["$mes"]." de {$ano}</b>";
            $html = str_replace($find, $subDate, $type['NewslettersEditableType']['html']);
           
            // <<< atualizar data
            ?>

    	<!-- >>> IMPORTANT -->

        <!-- >>> elfinder -->
        <?php
            echo $this->Html->css('../elfinder/css/elfinder.min.css');
            echo $this->Html->script('../elfinder/js/elfinder.min.js');
            ?>
        <!-- <<< elfinder -->

        <!-- >>> tinymce -->
        <?=$this->Html->script('tinymce_editable/tinymce.min.js');?>
        <script type="text/javascript">

            tinymce.init({
                selector: ".editable",
                inline: true,
                fixed_toolbar_container: "#barra",
                file_browser_callback: elFinderBrowser,
                plugins: [
                    "textcolor advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                toolbar: "forecolor backcolor | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });

            //elfinder
            function elFinderBrowser(field_name, url, type, win) {
                tinymce.activeEditor.windowManager.open({
                    file: '<?= $this->webroot; ?>elfinder/elfinder.html', // use an absolute path!
                    title: 'Upload de Imagem para NewsLetter Abear',
                    width: 900,
                    height: 450,
                    resizable: 'yes'
                }, {
                    setUrl: function(url) {
                        win.document.getElementById(field_name).value = url;
                    }
                });
                return false;
            }
        </script>
    	<!-- >>> IMPORTANT -->

        <meta charset="UTF-8">
    </head>

    <body style="margin-left: 0px;">

        <?php echo $this->Form->create($model); ?>

        <div style="background-color: #8A8A8A; color: #fff; z-index: 9999; position: fixed; top: 0; width:100%; ">
            <div style="background-color: #EEE; font-family: verdana; font-size: 14px; color: #949494;">
                <?=$this->Html->link('voltar', array('action' => 'admin_index'))?>
            </div>
            <div style="padding: 5px; font-family: verdana; font-size: 12px;padding-left: 50%;" id="menu_ferramenta">
                <div id="barra" style="margin-left: -321px;"></div>
            </div>
        </div>
        <table class='editable_' width="100%" border="0" cellspacing="0" cellpadding="0" style=" text-align: center;margin-top: 50px;">
            <tbody>
                <tr>
                    <td>
                        <table width="600" align='center' style="font-size: 14px;font-family: Calibri, Regular;margin-top: 50px;">
                            <tbody>
                                <tr>
                                    <td style="" colspan="3">
                                        <table style="margin-bottom: -20px;">
                                            <tr>
                                                <td style="min-width: 190px;" colspan="2">
                                                    <table style="float: right;position: absolute;">
                                                        <tbody>
                                                             <tr>
                                                                <td>
                                                                    <p style="float: right;color: #d0d0d0;font-family: Calibri, Regular; font-size: 14;margin-left: 210px;min-width: 277px;background-image: url(http://server.local/abear.com.br/www/uploads/newsletter/divisor-vertical.png);background-repeat: no-repeat;background-size: 1px 19px;background-position-x: 95%;background-position-y: 35%;">
                                                                        {DATA}
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <a href="[YOUTUBE]" style="text-decoration: none;float: right;padding-left: 10px;">
                                                                        <img src="http://server.local/abear.com.br/www/uploads/newsletter/youtube.png">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a href="[FACEBOOK]" style="text-decoration: none;float: right;padding: 0 30px;">
                                                                        <img src="http://server.local/abear.com.br/www/uploads/newsletter/facebook.png">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a href="[TWITTER]" style="text-decoration: none;float: right;">
                                                                        <img src="http://server.local/abear.com.br/www/uploads/newsletter/twitter.png">
                                                                    </a>
                                                                </td> 
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <a href="http://server.local/abear.com.br/www" style="text-decoration: none;">
                                                        <img src="http://server.local/abear.com.br/www/uploads/newsletter/Untitled-1_02.png" style="margin-top: -20px;margin-left: -3px;">
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table style="padding-bottom: 30px;background-color: #f3f3f3;display: block;margin-left: 24px;width: 650px;">
                                            <tbody>
                                                <tr >
                                                    <td>
                                                        <tr>
                                                            <td colspan="2">
                                                                <img src="http://server.local/abear.com.br/www/uploads/newsletter/destaques.png" style="padding: 0 30px;">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top" style="padding: 0px 0 0 30px;">
                                                                <a href="#" style="text-decoration: none;">
                                                                    <img src="http://server.local/abear.com.br/www/uploads/newsletter/foto-destaque.png" style="padding-right: 10px;">
                                                                </a>
                                                            </td>
                                                            <td valign="top" style="padding: 0px 30 0 0px;">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="color: #0d7f40;text-decoration: none;">
                                                                            <p style="margin-top: 18px;margin-top: 25px;">
                                                                                <a href="#" style="text-decoration: none;font-family: Calibri;font-weight: bold;color: #0d7f40;min-width: 350px;">
                                                                                    At ornare ligula quisque fermentum sapien sollicitudin congue, accumsan aenean himenaeos 
                                                                                </a>
                                                                            </p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="color: #797979;text-decoration: none;font-family: Calibri;color: #797979;font-size: 16px;min-width: 350px;">
                                                                                <p style="margin-top: 18px;margin-top: 10px;">
                                                                                    <a href="#" style="text-decoration: none;font-family: Calibri;color: #797979;font-size: 16px;">
                                                                                        At ornare ligula quisque fermentum sapien sollicitudin congue, accumsan aenean himenaeos accumsan aenean himenaeos 
                                                                                    </a>
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <a href="#" style="text-decoration: none;">
                                                                                    <img src="http://server.local/abear.com.br/www/uploads/newsletter/seta.png" style="padding-right: 10px;margin-top: 15px;">
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>

                                        <table style="padding-bottom: 30px;background-color: #f3f3f3;display: block;margin-left: 24px;width: 650px;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <tr>
                                                            <td valign="top"  style="padding: 0px 0 0 30px;">
                                                                <a href="#" style="text-decoration: none;">
                                                                    <img src="http://server.local/abear.com.br/www/uploads/newsletter/foto-destaque.png" style="padding-right: 10px;">
                                                                </a>
                                                            </td>
                                                            <td valign="top"  style="padding: 0 30px 0 0px;">
                                                                <table style="padding-bottom: 10px;background-color: #f3f3f3;display: block;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="color: #0d7f40;text-decoration: none;font-family: Calibri;font-weight: bold;color: #0d7f40; min-width: 350px;min-width: 350px;">
                                                                                <p style="margin-top: 18px;margin-top: 25px;">
                                                                                    <a href="#" style="text-decoration: none;font-family: Calibri;font-weight: bold;color: #0d7f40;">
                                                                                        At ornare ligula quisque fermentum sapien sollicitudin congue, accumsan aenean himenaeos 
                                                                                    </a>
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="color: #797979;text-decoration: none;font-family: Calibri;color: #797979;font-size: 16px;min-width: 350px;min-width: 350px;">
                                                                                <p style="margin-top: 18px;margin-top: 10px;">
                                                                                    <a href="#" style="text-decoration: none;font-family: Calibri;color: #797979;font-size: 16px;">
                                                                                        At ornare ligula quisque fermentum sapien sollicitudin congue, accumsan aenean himenaeos accumsan aenean himenaeos 
                                                                                    </a>
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <a href="#" style="text-decoration: none;">
                                                                                    <img src="http://server.local/abear.com.br/www/uploads/newsletter/seta.png" style="padding-right: 10px;margin-top: 15px;">
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>

                                                        </tr>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>

                                        <table style="background-color: #f3f3f3;display: block;width: 100%;margin-left: 24px;width: 650px;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <tr>
                                                            <td style="padding: 0 30px;">
                                                                <img src="http://server.local/abear.com.br/www/uploads/newsletter/NOTICIAS.png">
                                                            </td>
                                                            
                                                        </tr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0 30px;">
                                                        <table style="margin-left: -2px;">
                                                            <tbody>
                                                                <tr style="padding-bottom: 30px;background-color: #f3f3f3;display: block;">
                                                                    <td valign="top">
                                                                        <table style="padding-right: 10px;min-width: 250px;">
                                                                            <tbody>
                                                                                <tr style="background-image: url(http://server.local/abear.com.br/www/uploads/newsletter/divisor_horizontal.png);background-repeat: no-repeat;background-size: contain;background-position-x: 86%;background-position-y: 100%;">
                                                                                    <td>
                                                                                        <p style="margin-top: 10px;ext-decoration: none;font-family: Calibri; font-size: 16px;color: #797979;">
                                                                                            <a href="#" style="text-decoration: none;font-family: Calibri; font-size: 16px;color: #797979;">
                                                                                                Senectus quam fermentum non etiam imperdiet nam metus sapien, consectetur sodales 
                                                                                            </a>
                                                                                        </p>
                                                                                        <a href="#" style="text-decoration: none;">
                                                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/seta.png" style="padding-right: 10px;margin-top: -6px;margin-bottom: 10px;">
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr style="background-image: url(http://server.local/abear.com.br/www/uploads/newsletter/divisor_horizontal.png);background-repeat: no-repeat;background-size: contain;background-position-x: 86%;background-position-y: 100%;">
                                                                                    <td style="ext-decoration: none;font-family: Calibri; font-size: 16px;color: #797979;">
                                                                                        <p style="font-family: Calibri; font-size: 16px;color: #797979;margin-top: 10px;">
                                                                                            <a href="#" style="text-decoration: none;font-family: Calibri; font-size: 16px;color: #797979;">
                                                                                                Senectus quam fermentum non etiam imperdiet nam metus sapien, consectetur sodales
                                                                                            </a>
                                                                                        </p>
                                                                                        <a href="#" style="text-decoration: none;font-family: Calibri; font-size: 16px;color: #797979;">
                                                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/seta.png" style="padding-right: 10px;margin-top: -6px;margin-bottom: 10px;">
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr style="background-image: url(http://server.local/abear.com.br/www/uploads/newsletter/divisor_horizontal.png);background-repeat: no-repeat;background-size: contain;background-position-x: 86%;background-position-y: 100%;">
                                                                                    <td style="ext-decoration: none;font-family: Calibri; font-size: 16px;color: #797979;">
                                                                                        <p style="margin-top: 10px;">
                                                                                            <a href="#" style="text-decoration: none;font-family: Calibri; font-size: 16px;color: #797979;">
                                                                                                Senectus quam fermentum non etiam imperdiet nam metus sapien, consectetur sodales
                                                                                            </a>
                                                                                        </p>
                                                                                        <a href="#" style="text-decoration: none;font-family: Calibri; font-size: 16px;color: #797979;">
                                                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/seta.png" style="padding-right: 10px;margin-top: -6px;margin-bottom: 10px;">
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr >
                                                                                    <td style="ext-decoration: none;font-family: Calibri; font-size: 16px;color: #797979;">
                                                                                        <p style=";margin-top: 10px;">
                                                                                            <a href="#" style="text-decoration: none;font-family: Calibri; font-size: 16px;color: #797979;">
                                                                                                Senectus quam fermentum non etiam imperdiet nam metus sapien, consectetur sodales 
                                                                                            </a>
                                                                                        </p>
                                                                                        <a href="#" style="text-decoration: none;font-family: Calibri; font-size: 16px;color: #797979;">
                                                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/seta.png" style="padding-right: 10px;margin-top: -6px;margin-bottom: 10px;">
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td valign="top">
                                                                        <table style="margin-top: 3px;max-width: 300px; min-width: 300px;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <a href="#" style="text-decoration: none;">
                                                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/foto-1.png" style="margin-bottom: 10px;">
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="text-decoration: none;font-family: Calibri; font-size: 16px; color: #797979;font-weight: bold;">
                                                                                        <p>
                                                                                            <a href="#" style="text-decoration: none;font-family: Calibri; font-size: 16px; color: #797979;font-weight: bold;">
                                                                                                Senectus quam fermentum non etiam imperdiet nam metus sapien
                                                                                            </a>
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <p style="margin-top: 10px;text-decoration: none;font-family: Calibri; font-size: 16px; color: #797979;">
                                                                                            <a href="#" style="text-decoration: none;font-family: Calibri; font-size: 16px; color: #797979;">
                                                                                                Senectus quam fermentum non etiam imperdiet nam metus sapien, consectetur sodales
                                                                                            </a>
                                                                                        </p>
                                                                                        <a href="#" style="text-decoration: none;">
                                                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/seta.png" style="margin-bottom: 10px;">
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <img src="http://server.local/abear.com.br/www/uploads/newsletter/Untitled-1_04.png">
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                       
                    </td>
                </tr>
                
            </tbody>








            <?//=$html;?>
        </table> <!-- <<< editable -->

        <br />
        <br />
        <br />
        <br />
        <br />
        <div style="background-color: #8A8A8A; color: #fff; z-index: 9999; position: fixed; bottom: 0px;  width:100%; ">
            <div style="padding: 5px; font-family: verdana; font-size: 12px;padding-left: 50%;" id="menu_ferramenta">
                <div id="barra" style="margin-left: -321px;"></div>
            </div>


            <div align='center' style="padding: 10px; background-color: #EEE; font-family: verdana; font-size: 14px; color: #949494;">
                <?=$this->Form->input('titulo', array('div' => false));?>
                <?=$this->Form->end('Salvar', array('div' => ''));?>
            </div>


        </div>

    
    </body>

</html>