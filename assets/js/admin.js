jQuery(document).ready(function($) {

  var adminContent = $( '.wp-list-table' );
  // console.log( adminContent );

  adminContent.click( function(){

  	// alert('Whadap!');
  	$( this ).css('border', '1rem solid sienna');

  });
	
});