(function ( $ ) {
	
    $(document).ready(function() 
    {    	
    	$('.showModal').click(function(e)
        {
			e.preventDefault();			

    		$('.modal').modal('show');  

        }); 
    });
    
})( jQuery );