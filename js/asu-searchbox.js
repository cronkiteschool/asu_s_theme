/**
 * asu-searchbox.js
 *
 * Handles setting the ASU searchbox to use local wordpress site for searches if selected.
 */

jQuery(window).bind("load", function () {
	if (asusearchbox === undefined) {
        asusearchbox = 'default';
    }
	if('wordpress' === asusearchbox){
	jQuery("form[name='gs']").submit(function(){
		jQuery("form[name='gs']").each(function(i,e){
			var form_url = "<?php echo home_url( '/' ); ?>";		
			e.setAttribute('action', form_url );
			e.setAttribute('type', 'search' );
		});
		jQuery("input[name='q']").each(function(i,e){
			e.setAttribute('name', 's' );
		});
	});
	};
});

