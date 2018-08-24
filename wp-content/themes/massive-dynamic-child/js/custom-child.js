(function ($) {
    "use strict";
    $(document).ready(function () {
		
		// Made an update
		
		/* Handle the accordion event for hovering on services */
		jQuery('div [class*="service_section"]').hover(function(e){
			
			
			var $service = jQuery(this);
			var innerContent = '';
			if($service.attr('class').indexOf('service_section1') !== -1){
				innerContent = 'Digital Marketing';
			} else if($service.attr('class').indexOf('service_section2') !== -1){
				innerContent = 'Machine Learning';
			} else {
				innerContent = 'App Development';
			}
			jQuery('div#service_details').html(innerContent).toggleClass('active');
		});
		
		
		
    });
})(jQuery);