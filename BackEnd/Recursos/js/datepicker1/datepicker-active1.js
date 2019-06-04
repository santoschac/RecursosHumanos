(function ($) {
 "use strict";
 
	// Datepickers
		$('#start').datepicker({
			dateFormat: 'dd.mm.yy',
			prevText: '<i class="fa fa-chevron-left"></i>',
			nextText: '<i class="fa fa-chevron-right"></i>',
			onSelect: function( selectedDate )
			{
				$('#finish1').datepicker('option', 'minDate', selectedDate);
				
			}
		});
		$('#finish1').datepicker({
			dateFormat: 'dd.mm.yy',
			prevText: '<i class="fa fa-chevron-left"></i>',
			nextText: '<i class="fa fa-chevron-right"></i>',
			onSelect: function( selectedDate )
			{
				$('#start').datepicker('option', 'maxDate', selectedDate);
			}
		});
	
})(jQuery); 

