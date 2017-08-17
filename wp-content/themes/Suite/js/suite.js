jQuery(document).ready(function($){	
		jQuery("#slider").easySlider({
			auto: true, 
			continuous: true,
			numeric: true
		});

		jQuery(".btn-slide").click(function(){
			jQuery("#panel").slideToggle("slow");
			jQuery(this).toggleClass("active"); return false;
	    });
	});	