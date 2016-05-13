$( document ).ready(function() {
	/* DROPDOWN MENU */
		$('[dropdown-pj]').each(function(index, value){
			var obj = $(value);
			var attr = $(value).attr('dropdown-pj');
			var toOpen = $('.dropdown_pj#'+attr);

			obj.parent().parent().bind('mouseenter', function(e){
				e.preventDefault();
		    	$('.dropdown_pj').hide(0);
				toOpen.show(100).css('left','0 !important');
			}).bind('mouseleave', function(e){
				e.preventDefault();
				toOpen.hide(0).css('left','-9999px !important');
			});
		});
    /* END DROPDOWN MENU */
});