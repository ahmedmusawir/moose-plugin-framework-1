jQuery(document).ready(function($) {

  var adminContent = $( '.list-group-item' );
  // console.log( adminContent );

  adminContent.click( function(){

  	// alert('Whadap!');
  	$( this ).css('background-color', 'dodgerblue')
  			 .css('color', 'white');

  });
	
});