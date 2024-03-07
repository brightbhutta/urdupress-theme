initUrduEditor('http://www.radlabs.biz/');

makeUrduEditor('comment',12);
makeUrduEditor('field',18);
makeUrduEditor('excerpt',18);
makeUrduEditor('tw',18);
makeUrduEditor('newtag[post_tag]',18);
makeUrduEditor('s',18);

jQuery('document').ready(function(){
    jQuery('#comment').focus();  
});
jQuery(document).ready(function() {    
    jQuery("#comment").UrduEditor("14px");   
    $("#subject").UrduEditor("14px");   
    $("#message").UrduEditor("18px");                 
}); 