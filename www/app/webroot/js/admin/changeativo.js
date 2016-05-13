function changeAtivo(e , controller,  model, campo_tabela)
{	
	var id = $(e).val();	
	var check = $(e).is(":checked");
	var model = model;
	var campo_tabela = campo_tabela;
	if(check) check = 1;
	else check = 0;
				
	var localAction = webroot + controller +'/changeativo'; 
												
	$.ajax({
			type: 'POST',
			url: localAction,
			data: {id: id, checked: check, model: model, campo_tabela: campo_tabela },
			success: function(data) {
				
		   }	   
	});	
	
}