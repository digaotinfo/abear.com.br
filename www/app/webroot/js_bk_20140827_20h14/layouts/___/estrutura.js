$('.conselheiro').hide();
$('.conselheiro:first').show();


$('.logos div').click(function(){
    $('.logos div').removeClass('active');

    var the_class = $(this).attr('class');

    $(this).addClass('active');

    $('.conselheiro').each(function(){

        if($(this).hasClass('active') && $(this).attr('id') != the_class){
            $(this).hide().removeClass('active');
        }
        if($(this).attr('id') == the_class && !$(this).hasClass('active')){
            $(this).fadeIn().addClass('active');
        }

    })


    $('.line.active.a1').removeClass('azul').removeClass('tam').removeClass('gol').removeClass('avianca');
    $('.line.active.a1').addClass(the_class);

})
