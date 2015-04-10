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
jQuery(document).ready(function() {
    
		jQuery(".basic-example").heapbox();
		jQuery(".type").heapbox();
		jQuery(".city").heapbox();
		jQuery(".status_prop").heapbox();
		jQuery(".heapOption a").click(function(){
		 var search='';
		   var ajaxurl         	= interfeis_var.adminurl+'admin-ajax.php';
		 
			if(jQuery(".basic-example option:selected").val()!=''){
		
		if(jQuery(".city option:selected").val()!="" && jQuery(this).parents('.heapBox').siblings('select').hasClass('basic-example')==false){  search='&city='+jQuery(".city option:selected").val();}
		if(jQuery(".type option:selected").val()!=""){  search+='&type='+jQuery(".type option:selected").val();}
		//if(jQuery("#search").val()!="" && jQuery("#search").val()!=" "){  search+='&search='+jQuery("#search").val();}
		if(jQuery(".status_prop option:selected").val()!=""){  search+='&status_prop='+jQuery(".status_prop option:selected").val();}
		window.location.href =interfeis_var.siteurl+'/property/?state='+jQuery(".basic-example option:selected").val()+''+search;
		
		}else if(jQuery(".type option:selected").val()!=''){
		if(jQuery(".status_prop option:selected").val()!=""){  search+='&status_prop='+jQuery(".status_prop option:selected").val();}
		//if(jQuery("#search").val()!=""){  search+='&search='+jQuery("#search").val();}
			window.location.href =interfeis_var.siteurl+'/property/?type='+jQuery(".type option:selected").val()+''+search;
		}else if(jQuery(".status_prop option:selected").val()!=''){
		if(jQuery(".type option:selected").val()!=""){  search+='&type='+jQuery(".type option:selected").val();}
		//if(jQuery("#search").val()!=""){  search+='&search='+jQuery("#search").val();}
		window.location.href =interfeis_var.siteurl+'/property/?status_prop='+jQuery(".status_prop option:selected").val()+''+search;
		
		}else{
		window.location.href =interfeis_var.siteurl+'/property/';
		}
		});
		
		jQuery( "#search_prop" ).submit(function( event ) {
		window.location.href =interfeis_var.siteurl+'/property/?search='+jQuery("#search").val();
	return false;
		});
		

	});