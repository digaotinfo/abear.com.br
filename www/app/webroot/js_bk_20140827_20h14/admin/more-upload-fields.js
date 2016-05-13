/**
Para adicionar mais campos de upload/texto/etc
@author Ayesha Lomaski
**/
cliked = true;
$("a#mais_logos").click(function(e){
    e.preventDefault();
    if(cliked == true){
        clicked = false;
        
        var indexes = $('#input_file:last').attr('data-index');
        var next_index = parseInt(indexes) + 1;

        $('#input_file:last').clone().appendTo('#div_com_input_file');
        $('#input_file:last').attr('data-index', next_index).attr('name', 'img_file[' + next_index + ']');

        cliked = true;
    }


})
