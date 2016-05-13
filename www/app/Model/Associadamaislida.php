<?
class Associadamaislida extends AppModel{
	var $useTable = 'tb_noticias_mais_lidas';
	
	
	public function getMaisLidas($limit = 10, $order = 'desc', $lang = 'ptbr', $cat=null) {
		//print_r($cat);
		$registros = $this->query("
							SELECT 
								Associadamaislida.titulo_". $lang .",
								Associadamaislida.noticia_categoria_id,
								Categoria.url_amigavel_". $lang .",
								Associadamaislida.url_amigavel_". $lang ."
							
							FROM
								tb_noticias as Associadamaislida
								inner join tb_noticias_categoria as Categoria on (Associadamaislida.noticia_categoria_id = Categoria.id)
							
							WHERE
								Associadamaislida.id in (
									SELECT 
										noticia_id
							
									FROM (
										SELECT 
											count(noticia_id) as total
											, noticia_id
							
										FROM
											tb_noticias_mais_lidas
							
										GROUP BY
											noticia_id
							
										ORDER BY 
											total ". $order ."
										
										LIMIT
											". $limit ."
									) as Maislidas									  
                                   WHERE
                                   		Associadamaislida.noticia_categoria_id = ".$cat."	
								)
		");
		
		return $registros;
		
	}
}