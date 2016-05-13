
function recomendarMateria( rec)
{	
	var localAction = webroot + rec[0] +'/recomendarmateria'; 
												
	$.ajax({
			type: 'POST',
			url: localAction,
			data: { editoria_url : rec[1] , materia_url : rec[2],  blog : rec[3], blog_url : rec[4], titulo : rec[5] ,chamada : rec[6] , imagem: rec[7] , id : rec[8] },
			success: function(data) {
				$("#recomendar_" + rec[8]).hide();
				$("#removerecomendar_" + rec[8]).show();
				
		   }	   
	});	
	
}


function removerecomendarMateria( rec)
{	
	var localAction = webroot + rec[0] +'/removerecomendarmateria'; 
												
	$.ajax({
			type: 'POST',
			url: localAction,
			data: { id : rec[1] , blog : rec[2] },
			success: function(data) 
			{
				$("#recomendar_" + rec[1]).show();
				$("#removerecomendar_" + rec[1]).hide();
		   }	   
	});	
	
}
