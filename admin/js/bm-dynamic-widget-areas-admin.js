(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$(function() {

		//Add new widget area
		$('#bm-dwa-areas-wrap').on('click', '#bm-dwa-add', function(e){
			e.preventDefault();
			console.log('clicked');
			var area_items_count = $('#bm-dwa-areas').find('.bm-dwa-area-item').length + 1;

			var item_html = '<div class="bm-dwa-area-item"><p><input type="text" name="bm_dynamic_widget_areas['+area_items_count+'][name]" id="bm-dwa-widget-name-'+area_items_count+'" value=""/><input hidden type="text" name="bm_dynamic_widget_areas['+area_items_count+'][id]" id="bm-dwa-widget-id-'+area_items_count+'" value="bm-dwa-widget-id-'+area_items_count+'"/><a href="#" class="bm-dwa-area-item-remove">Remove</a></p></div>';
			$('#bm-dwa-areas').append(item_html);


		});
		
		//Remove individual widget area
		$('#bm-dwa-areas-wrap').on('click', '.bm-dwa-area-item-remove', function(e){
			e.preventDefault();
			console.log('removal clicked');
			$(this).parent().css( 'background-color', '#FF6C6C' );
			$(this).parent().fadeOut("slow", function() {
		    	$(this).parent().remove();
		    	
			});
		});
	});

})( jQuery );
