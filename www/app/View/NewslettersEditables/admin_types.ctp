<?php 
// print_r($registros);
?>

	<h1>Selecione o Modelo da Newsletters</h1>

    <div class="voltar" align="right">
        <?=$this->Html->link('[voltar]', array('action' => 'admin_index'))?>
    </div>

	<div id="conteudo_form">
        <table>
            <tr>
            <?php foreach($registros as $registro): ?>
                <td>
                    <table>
                        <tr>
                            <th><?=$registro[$model]['nome']?> </th>
                        </tr>
                        <tr class="interna-newsletter">
                            <td valign="top">
                                <a href="<?=$this->webroot?>admin/adicionar-newsletter/type/<?=$registro[$model]['id']?>">
                                    <!-- <div class="area-news" style="background-image: url(<?=$this->webroot.$registro[$model]['img_file']?>)">
                                    </div> -->
                                    <img src="<?=$this->webroot.$registro[$model]['img_file']?>" border="0" style="width:100%">
                                </a>
                            </td>
                        </tr>
                    </table>
                    
                </td>
            <?php endforeach; ?>
            </tr>
		</table>

    </div>