var isContatoAnimated = false;

$(function (){

	$('.menu #menu li.bt a').bind('click', function(p){
		//p.preventDefault();
		if(isContatoAnimated) contatoDeanimate();
	});

	$('.menu #menu li.bt#contato a').unbind('click').bind('click', function(p){
		p.preventDefault();
		//console.log("CLICK");
		if(!isContatoAnimated){
			contatoAnimate();
		}else{
			contatoDeanimate();
		}
	});
	
	$('.holdd.prod .middle #img_menu div').bind('mouseenter',function(p){
		p.preventDefault();
		$('.holdd.prod .middle #img_hold img').attr('src',$(this).children('img').attr('src'));
	})


	if($('.holdd').hasClass('prod') || $('.holdd').hasClass('amotocar') || $('.holdd').hasClass('finam') || $('.holdd').hasClass('posvenda') || $('.holdd').hasClass('revenda') || $('.holdd').hasClass('noticia')){
		$('body, holdd').css('min-height', (370+getHeight())+'px');
		$('.footer').css('bottom','-370px');
	}else if($('.holdd').hasClass('oportun') || $('.holdd').hasClass('concess')){
		$('body, holdd').css('min-height', (260+getHeight())+'px');
		$('.footer').css('bottom','-260px');
	}else if($('.holdd').hasClass('triciclos')){
		$('body, holdd').css('min-height', (100+getHeight())+'px');
		$('.footer').css('bottom','-100px');
	}
});

function contatoAnimate(){
	console.log("contatoAnimate()");

	$(".contato").animate({
		height: "370px"
	}, {
		queue: false,
		duration: 400
	})

	isContatoAnimated = true;

	setTimeout(function(){
		$(".contato > ul").addClass("active");

		$('holdd').bind('click', function(p){
			contatoDeanimate();
		});
	},350);

}

function contatoDeanimate(){
	console.log("contatoDeanimate()");

	$(".contato ul").removeClass("active");
	$('holdd').unbind('click');

	$(".contato").animate({
		height: "3px"
	}, {
		queue: false,
		duration: 400
	})

	isContatoAnimated = false;
}

function prod_img_select(){

}


/*PRE-MADE FUNCTIONS*/
function getWidth(){
        xWidth = null;
        if(window.screen != null) xWidth = window.screen.availWidth;
        if(window.innerWidth != null) xWidth = window.innerWidth;
        if(document.body != null) xWidth = document.body.clientWidth;
        return xWidth;
 }
function getHeight(){
        xHeight = null;
        if(window.screen != null) xHeight = window.screen.availHeight;
        if(window.innerHeight != null) xHeight =   window.innerHeight;
        if(document.body != null) xHeight = document.body.clientHeight;
        return xHeight;
}