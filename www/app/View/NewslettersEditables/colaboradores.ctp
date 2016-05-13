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
                        'Sun'=>'Domingo',
                        'Mon'=>'Segunda-Feira',
                        'Tue'=>'Terca-Feira',
                        'Wed'=>'Quarta-Feira',
                        'Thu'=>'Quinta-Feira',
                        'Fri'=>'Sexta-Feira',
                        'Sat'=>'Sábado'
                        );

            $mes_extenso = array(
                                'Jan'=>'Janeiro',
                                'Feb'=>'Fevereiro',
                                'Mar'=>'Marco',
                                'Apr'=>'Abril',
                                'May'=>'Maio',
                                'Jun'=>'Junho',
                                'Jul'=>'Julho',
                                'Aug'=>'Agosto',
                                'Nov'=>'Novembro',
                                'Sep'=>'Setembro',
                                'Oct'=>'Outubro',
                                'Dec'=>'Dezembro'
                            );
            // $find = "{data}";
            // $subDate =  $semana["$data"].", <b>{$dia} de ".$mes_extenso["$mes"]." de {$ano}</b>";
            // $newDate = str_replace($find, $subDate, subject)
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
        <?=$this->Html->script('tinymce_editable/tinymce.min.js');
        ?>
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

    <body>

        <?php echo $this->Form->create($model); ?>

        <div style="background-color: #8A8A8A; color: #fff; z-index: 9999; position: fixed; top: 0; width:100%; ">
            <div style="background-color: #EEE; font-family: verdana; font-size: 14px; color: #949494;">
                <?=$this->Html->link('voltar', array('action' => 'admin_index'))?>
            </div>
            <div style="padding: 5px; font-family: verdana; font-size: 12px;padding-left: 50%;" id="menu_ferramenta">
                <div id="barra" style="margin-left: -321px;"></div>
            </div>
        </div>
        <table class='editable' width="100%" border="0" cellspacing="0" cellpadding="0" style=" text-align: center;margin-top: 50px;">
            <tbody>
                <tr>
                    <td>
                        <table width="600" align='center' style="font-size: 14px;font-family: Calibri;">
                            <tbody>
                                <tr>
                                    <td style="background-image: url(http://server.local/abear.com.br/www/uploads/newsletter/topo.png);height: 134px;background-position: center center;background-size: 100%;background-repeat: no-repeat;" colspan="2">
                                        <table style="float: right;">
                                            <tr>
                                                <td>
                                                    <a href="[TWITTER]" style="float: right;padding-right: 20px;margin-top: 20px;" target="_blank">
                                                        <img src="http://server.local/abear.com.br/www/uploads/newsletter/twitter.png">
                                                    </a>
                                                    <a href="[FACEBOOK]" style="float: right;padding-right: 20px;margin-top: 20px;" target="_blank">
                                                        <img src="http://server.local/abear.com.br/www/uploads/newsletter/facebook.png">
                                                    </a>
                                                    <a href="[YOUTUBE]" style="float: right;padding-right: 20px;margin-top: 20px;" target="_blank">
                                                        <img src="http://server.local/abear.com.br/www/uploads/newsletter/youtube.png">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 14;margin-right: 20px;font-size: 14px;font-family: Calibri;color: #7979;">
                                                    <p style="color: #d0d0d0;font-family: Calibri; font-size: 14;padding: 0 18px;">
                                                        {DATA}
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table style="width: 290px;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="#" style="text-decoration: none;" target="_blank">
                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/foto-1.png" style="margin-top: 30px;margin-bottom: 15px;width: 277px;">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr style="font-family: Calibri;font-weight: bold; font-size: 16px;color: #797979;padding-top: 55px; padding-right: 20px;">
                                                    <td style="text-decoration: none;color: #797979;">
                                                        <a href="#" style="text-decoration: none;color: #797979;">
                                                            <p>
                                                                Premio Jornalismo ABEAR DE JORNALISMO imperdiet eleifend vestibulum.
                                                            </p>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr style="line-height: 20px;font-family: Calibri;font-size: 16px;color: #797979;">
                                                    <td width="300" style="padding-right: 20px;text-decoration: none;color: #797979;">
                                                        <p style="margin-top: 15px;">
                                                            <a href="#" style="text-decoration: none;color: #797979;">
                                                                CHAMADA Interdum congue dolor turpis purus egestas imperdiet eleifend vestibulum.
                                                            </a>
                                                        </p>
                                                        <a href="#" style="text-decoration: none;color: #797979;">
                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/seta.png" style="margin-bottom: 25px;">
                                                        </a>
                                                        <br>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td valign="top">
                                        <table style="color: #797979;font-family: Calibri; font-size: 14;background-size: contain;">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" style="padding-top: 30px;">
                                                        <img src="http://server.local/abear.com.br/www/uploads/newsletter/ultimas-noticas.png" style="margin-bottom: 10px;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 0" valign="top">
                                                        <a href="#" style="text-decoration: none;" target="_blank">
                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/foto-lateral.png" style="width: 116px;margin-right: 10px;border-radius: 10%;">
                                                        </a>
                                                    </td>
                                                    <td valign="top" style="padding-right: 10px;text-decoration: none;color: #797979;min-width: 200px;">
                                                        <p style="padding-top: 10px;padding-right: 10px;">
                                                            <a href="#" style="text-decoration: none;color: #797979;font-family: Calibri; font-size: 16;" target="_blank"> 
                                                                Texto Interdum congue dolor turpis purus egestas imperdiet eleifend vestibulum.
                                                            </a>
                                                        </p>
                                                        <a href="#" style="text-decoration: none;color: #797979;" target="_blank">
                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/seta.png" style="margin-bottom: 20px;">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <a href="#" style="text-decoration: none;" target="_blank">
                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/divisor_horizontal.png" style="margin-bottom: 17px;width: 100%;">
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style="font-family: Calibri; font-size: 14;margin-top: -15px;background-size: contain;">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 0" valign="top">
                                                     
                                                    </td>
                                                    <td valign="top" style="padding-right: 10px;text-decoration: none;color: #797979;min-width: 200px;">
                                                        <p style="padding-top: 10px;padding-right: 10px;">
                                                            <a href="#" style="text-decoration: none;color: #797979;font-family: Calibri; font-size: 16;" target="_blank"> 
                                                                Texto Interdum congue dolor turpis purus egestas imperdiet eleifend vestibulum.
                                                            </a>
                                                        </p>
                                                        <a href="#" style="text-decoration: none;color: #797979;" target="_blank">
                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/seta.png" style="margin-bottom: 20px;">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <a href="#" style="text-decoration: none;" target="_blank">
                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/divisor_horizontal.png" style="margin-bottom: 10px;width: 100%;">
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style="margin-top: -15px;font-family: Calibri; font-size: 14;margin-top: -6px;background-size: contain;">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 0" valign="top">
                                                        <a href="#" style="text-decoration: none;" target="_blank">
                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/foto-lateral.png" style="width: 116px;margin-right: 10px;border-radius: 10%;">
                                                        </a>
                                                    </td>
                                                    <td valign="top" style="padding-right: 10px;text-decoration: none;color: #797979;min-width: 200px;">
                                                        <p style="padding-top: 10px;padding-right: 10px;">
                                                            <a href="#" style="text-decoration: none;color: #797979;font-family: Calibri; font-size: 16;"> 
                                                                Texto Interdum congue dolor turpis purus egestas imperdiet eleifend vestibulum.
                                                            </a>
                                                        </p>
                                                        <a href="#" style="text-decoration: none;color: #797979;" target="_blank">
                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/seta.png" style="margin-bottom: 25px;">
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class='' width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #f3f3f3;">
                            <tbody>
                                <tr>
                                    <td>
                                        <table width="660" border="0" cellspacing="0" cellpadding="0" align='center' style="padding: 0 20px;">
                                            <tbody>
                                                <tr style="background-color: #f3f3f3;width: 100%;">
                                                    <td colspan="3">
                                                        <img src="http://server.local/abear.com.br/www/uploads/newsletter/eventos-projetos.png" style="margin-top: 15px;margin-left: -64px;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <a href="#" style="text-decoration: none;">
                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/foto-evento-projeto.png" style="margin-top: 30px;">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr style="background-color: #f3f3f3;width: 100%; height: 50px;font-size: 16px;font-family: Calibri;color: #797979;">
                                                    <td style="padding-top: 40px;width: 200px;background-image: url(http://server.local/abear.com.br/www/uploads/newsletter/divisor-vertical.png);background-position-x: 92%;background-repeat: no-repeat;background-position-y: 55%;text-decoration: none;color: #797979;" valign="top">
                                                        <p align="justfy" style="width: 190px;margin-top: -15px;">
                                                            <a href="#" style="text-decoration: none;color: #797979;" target="_blank">
                                                                Texto Interdum congue dolor turpis purus egestas imperdiet eleifend.
                                                            </a>
                                                        </p>
                                                        <a href="#" style="text-decoration: none;color: #797979;" target="_blank">
                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/seta.png" style="margin-bottom: 10px;">
                                                        </a>
                                                    </td>

                                                    <td style="padding-top: 40px;width: 200px;background-image: url(http://server.local/abear.com.br/www/uploads/newsletter/divisor-vertical.png);background-position-x: 92%;background-repeat: no-repeat;background-position-y: 55%;text-decoration: none;color: #797979;" valign="top">
                                                        <p align="justfy" style="width: 190px;margin-top: -15px;">
                                                            <a href="#" style="text-decoration: none;color: #797979;" target="_blank">
                                                                Texto Interdum congue dolor turpis purus egestas imperdiet eleifend.
                                                            </a>
                                                        </p>
                                                        <a href="#" style="text-decoration: none;" target="_blank">
                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/seta.png" style="margin-bottom: 10px;">
                                                        </a>
                                                    </td>

                                                    <td style="padding-top: 40px;width: 200px;text-decoration: none;color: #797979;" valign="top">
                                                        <p align="justfy" style="width: 190px;margin-top: -15px;">
                                                            <a href="#" style="text-decoration: none;color: #797979;" target="_blank">
                                                                Texto Interdum congue dolor turpis purus egestas imperdiet eleifend.
                                                            </a>
                                                        </p>
                                                        <a href="#" style="text-decoration: none;color: #797979;" target="_blank">
                                                            <img src="http://server.local/abear.com.br/www/uploads/newsletter/seta.png" style="margin-bottom: 10px;">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr style="background-color: #f3f3f3;">
                                                    <td colspan="3">&nbsp</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="center" style="background-color: #fff;padding-bottom: 30px;"><img src="http://server.local/abear.com.br/www/uploads/newsletter/rodape.png" style="margin-top: 20px;"></td>
                                </tr>
                                        
                            </tbody>
                        </table> 
                    </td>
                </tr>
            </tbody>
        </table> 

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