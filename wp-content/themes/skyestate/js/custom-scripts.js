jQuery('document').ready(function(){

jQuery(".property-filter .toggle").toggle(function(){
jQuery('.filterbox').show("slow");
	jQuery(this).html('-');
}, function(){
	jQuery('.filterbox').hide("slow");
	jQuery(this).html('+');
});

});

jQuery( window ).resize(function() {

var windowSize = jQuery(window).width();
if(windowSize >=768 ){	
	jQuery('.filterbox').show();	
} 
if(windowSize <=767 ){	
	jQuery('.filterbox').hide();
	jQuery('#outertop').after("<div class='clear'></div>");
	//jQuery('.callAction-full-container').parents('.columns').css('padding', '0')

}
	});
