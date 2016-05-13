var placeholder = "PESQUISAR";
$("#search").val(placeholder);

$("#search").focusin(function(){
	if($(this).val() == placeholder){
		$(this).val("");
	}
	alert("peguei sim!"+placeholder)
});

$("#search").focusout(function(){
	if($(this).val() == placeholder || $(this).val() == ""){
		$(this).val(placeholder);
	}
});