<?php
class Noticia extends AppModel {
	var $useTable = "tb_noticias";

	var $order = 'Noticia.data DESC';
	public $belongsTo = array('NoticiaCategoria', 'GaleriaImagenCapa');


	public function destaquesComFoto($idioma) {
		$registros = $this->query('
								Select * from (
									select * from (
										select
											`Noticia`.`titulo_'. $idioma .'`,
											`Noticia`.`url_amigavel_'. $idioma .'`,
											`Noticia`.`imagem_capa_file` as `imagem_capa`,
											"noticias" as `url_model`,
											`Noticia`.`created`
										from
											`tb_noticias` as `Noticia`
										where
												`Noticia`.`ativo` = 1
											and `Noticia`.`destaque` = 1
											and `Noticia`.`destaque_com_foto` = 1
											and `Noticia`.`publicar_em_'. $idioma .'` = 1
										order by
											`Noticia`.`created` DESC
										limit
											1
									) as `noticias_home`

									union

									select * from (
										select
											`Release`.`titulo_'. $idioma .'`,
											`Release`.`url_amigavel_'. $idioma .'`,
											`Release`.`imagem_file` as `imagem_capa`,
											"releases" as `url_model`,
											`Release`.`created`
										from
											`tb_releases` as `Release`
										where
												`Release`.`ativo` = 1
											and `Release`.`destaque` = 1
											and `Release`.`destaque_com_foto` = 1
											and `Release`.`publicar_em_'. $idioma .'` = 1
										order by
											`Release`.`created` DESC
										limit
											1
									) as `releases_home`
								) as `destaque_home`
								order by
									`destaque_home`.`created` DESC

								limit
									1
								');

		return $registros;
	}

	public function destaquesSemFoto($idioma) {
		$registros = $this->query('
								Select * from (
									select * from (
										select
											`Noticia`.`titulo_'. $idioma .'`,
											`Noticia`.`url_amigavel_'. $idioma .'`,
											`Noticia`.`imagem_capa_file` as `imagem_capa`,
											"noticias" as `url_model`,
											`Noticia`.`created`
										from
											`tb_noticias` as `Noticia`
										where
												`Noticia`.`ativo` = 1
											and `Noticia`.`destaque` = 1
											and `Noticia`.`destaque_com_foto` = 0
											and `Noticia`.`publicar_em_'. $idioma .'` = 1
										order by
											`Noticia`.`created` DESC
										limit
											2
									) as `noticias_home`

									union

									select * from (
										select
											`Release`.`titulo_'. $idioma .'`,
											`Release`.`url_amigavel_'. $idioma .'`,
											`Release`.`imagem_file` as `imagem_capa`,
											"releases" as `url_model`,
											`Release`.`created`
										from
											`tb_releases` as `Release`
										where
												`Release`.`ativo` = 1
											and `Release`.`destaque` = 1
											and `Release`.`destaque_com_foto` = 0
											and `Release`.`publicar_em_'. $idioma .'` = 1
										order by
											`Release`.`created` DESC
										limit
											2
									) as `releases_home`
								) as `destaque_home`
								order by
									`destaque_home`.`created` DESC

								limit
									2
								');

		return $registros;
	}
}
?>
