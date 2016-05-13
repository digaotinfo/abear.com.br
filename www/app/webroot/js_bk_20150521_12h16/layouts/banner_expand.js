$(document).ready(function(){
    var selectorDefault = $('.slick-slide a.expand');
    var selectorImgDefault = $('.slick-active a.expand .img-default');
    var heightDefault = $(".slick-slide").height();
    var heightOpen = heightDefault*2;

    selectorDefault.attr('href', 'javascript:void(0);');

    //>>> HOVER
    selectorDefault.hover(
        function() {
            var hover = $(this).attr('data-hover');
            var link = $(this).attr('data-link');
            var target = $(this).attr('data-target');

            if(hover == 1){

                var idBannerDefault = $(this).attr('id');
                var imgBannerExpanded= $('.img-expand.'+idBannerDefault+' img').attr('src');
                heightExpand($(this), heightOpen, idBannerDefault);
                if(target == 1){
                    $(this).attr('target', '_blank');
                }
                $(this).attr('href', link);
            }

        });
    //<<< HOVER

    //>>> CLICK
    selectorDefault.click(
        function(){
            var hover = $(this).attr('data-hover');
            var link = $(this).attr('data-link');
            var target = $(this).attr('data-target');

            // console.log('target = '+target);

            if(hover == 0){
                var idBannerDefault = $(this).attr('id');
                var imgBannerExpanded= $('.img-expand.'+idBannerDefault+' img').attr('src');

                heightExpand($(this), heightOpen, idBannerDefault);

                setTimeout(function(){
                                     selectorDefault.attr('href', link);
                                    if(target == 1){
                                        $('#'+idBannerDefault).addClass('expanded');
                                        $('a#'+idBannerDefault).attr('target', '_blank');
                                    }
                                }, 500);
            }

        });
    //<<< CLICK

    //>>> MOUSEOUT
    selectorDefault.mouseout(function() {
          heightNormal(heightDefault);
        selectorDefault.attr('href', 'javascript:void(0);');
    });
    selectorDefault.click(function() {
        // console.log($(this).attr('target'));
        // console.log('chegou aqui');
        // console.log($(this).hasClass('expanded'));

        if ($(this).hasClass('expanded')) {
            setTimeout(function(){

                heightNormal(heightDefault);
                selectorDefault.attr('href', 'javascript:void(0);');

                $(this).attr('target', '');
                $('.alterado').attr('target', '');

                // console.log('feito...');
                // console.log($(this).attr('target'));
            }, 1000);
        }
    });
    //<<< MOUSEOUT
});


//>>> Expandir img
function heightExpand(selectorDefault, heightExpand, idBannerDefault, link){
    var img = $('.new-img.'+idBannerDefault).attr('src');
    $('#'+idBannerDefault+' img').attr("src", img);
    $('#'+idBannerDefault).addClass("alterado");

    selectorDefault.stop().animate({"height": heightExpand}, "slow");

}
//<<< Expandir img

//>>> Normalizar img
function heightNormal(heightDefault){
    var altBannerDefault = $('.alterado').attr('alt');
    var idBannerDefault = $('.alterado').attr('id');
    var img = $('.alterado').attr('data-img');

    $('.alterado img').remove();
    $( '.alterado' ).append('<img src="'+img+'" id-banner='+idBannerDefault+' class="img-default" alt="'+altBannerDefault+'" >');
    $('.alterado').stop().animate({"height": heightDefault}, "fast");

    $('.alterado').removeAttr('target');
    $('.alterado').attr('href', 'javascript:void(0);');

    $('.expand').removeClass('expanded');
    $('.expand').removeClass('alterado');
}
//<<< Normalizar img
