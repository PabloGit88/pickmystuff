(function ( $ ) {
	
    $(document).ready(function() 
    {    	
    	$('.showModal').click(function(e)
        {
			e.preventDefault();			
    		$('.modal').modal('show');  
        }); 

    	var sendingCostumerForm = false;
    	$(".costumerForm form").validate(
    	{
			onkeyup: false,
			onclick: false,
			onfocusout: false,
			errorPlacement: function(error, element) 
			{
			},
			highlight: function(element, errorClass, validClass) 
			{
			    $(element).addClass(errorClass).removeClass(validClass);
			},
			unhighlight: function(element, errorClass, validClass) 
			{
			    $(element).removeClass(errorClass).addClass(validClass);
			},
			invalidHandler: function(event, validator)
			{
				alert("Debes completar todos los campos correctamente para continuar.");
			},
			submitHandler: function(form)
			{
				if(sendingCostumerForm == false)
	        	{
					sendingCostumerForm = true;
		        	$.ajax({
			        	  url: $(form).attr("action"),
			        	  type: "POST",
			        	  data: $(form).serialize(),
			        	  success: function(data, textStatus, xhr) 
			        	  {
			        		  $('.costumerForm .sended').show();
			        		  $(form).trigger("reset");
			              },
			              complete: function(jqXHR,textStatus)
			              {
			            	  sendingCostumerForm = false;
			              }
			        });
	        	}
			}    			
    	}); 
    });
    
})( jQuery );