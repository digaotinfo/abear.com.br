<?php
class ClippingMaisLida extends AppModel{
	var $useTable = 'tb_clipping_mais_lido';


	public function getMaisLidas($limit = 10, $order = 'desc', $lang) {
		$registros = $this->query("
							SELECT
								ClippingMaisLida.titulo_". $lang .",
								ClippingMaisLida.url_amigavel_". $lang ."
				
							FROM
								tb_clipping as ClippingMaisLida
				
							WHERE
								ClippingMaisLida.id in (
									SELECT
										clipping_id
				
									FROM (
										SELECT
											count(clipping_id) as total
											, clipping_id
				
										FROM
											tb_clipping_mais_lido
				
										GROUP BY
											clipping_id
				
										ORDER BY
											total ". $order ."

										LIMIT
											". $limit ."
									) as Maislidas
								)
		");

		return $registros;

	}
}