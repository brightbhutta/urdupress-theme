var license_status = stylo_license.key_status;
if( license_status == "active" ) {
$(document).ready(function(){
		
    $('#mobileSearchBtn').click(function(){
        $('.mobile-search-bar').fadeToggle();
    });
    
    $('#searchF').click(function(){
        $('#headerSearchForm').fadeToggle();
    });

    $('#changelocation').click(function(){
        $('#location-selector').fadeToggle();
    });
    $('#closeLocChanger').click(function(){
        $('#location-selector').fadeOut();
    });

    $('#closeSearchBox').click(function(){
        $('.search_form').fadeOut();
    });

    $('#comment-toggle').click(function(){
        $('#comment-box').slideToggle();
    });
    
    $('#navBtn').click(function(){
        $('.mobile-menu').fadeToggle();
    });
    
    $('.block-post-grid').matchHeight();
    $('.related-block-post-grid').matchHeight();

    $('#incSize').click(function(){    
		curSize= parseInt($('#post-conten-single p').css('font-size')) + 2;
		if(curSize<=40)
			$('#post-conten-single p').css('font-size', curSize);
	});  
	$('#dcrSize').click(function(){    
		curSize= parseInt($('#post-conten-single p').css('font-size')) - 2;
		if(curSize>=12)
			$('#post-conten-single p').css('font-size', curSize);
    });
    
    $('#searchInput').UrduEditor("14px");   
    $('textarea').UrduEditor("18px");  

});
} else {
    jQuery(".activation-notice").fadeIn();
}