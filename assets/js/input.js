(function($){
	
	
	/**
	*  initialize_field
	*
	*  This function will initialize the $field.
	*
	*  @date	30/11/17
	*  @since	5.6.5
	*
	*  @param	n/a
	*  @return	n/a
	*/
	function initialize_field( $field ) {
		
		$(".acf-ccb-button").on("click", function(e){
			e.preventDefault();
			var copyText = $(this).closest('.acf-ccb-wrapper').find('.acf-ccb-text-field').get(0);
			copyText.select();
			copyText.setSelectionRange(0, 99999);
			navigator.clipboard.writeText(copyText.value);
			var oldtext = $(".acf-ccb-btn-txt").text();
			$(".acf-ccb-btn-txt").text(acf_ccb.txt_copied);
			setTimeout( function(){
				$(".acf-ccb-btn-txt").text(oldtext);
			}, 4000, oldtext);
		});
		
	}
	
	
	if( typeof acf.add_action !== 'undefined' ) {
		/*
		*  ready & append (ACF5)
		*
		*  These two events are called when a field element is ready for initizliation.
		*  - ready: on page load similar to $(document).ready()
		*  - append: on new DOM elements appended via repeater field or other AJAX calls
		*
		*  @param	n/a
		*  @return	n/a
		*/
		acf.add_action('ready_field/type=copy_clipboard', initialize_field);
		acf.add_action('append_field/type=copy_clipboard', initialize_field);
	}

})(jQuery);
