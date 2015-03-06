/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
(function ( $ ) {
    'use strict';

    $(document).ready(function() {
        $('.variant-table-toggle .icon').toggle(function() {
            $(this).removeClass('icon-chevron-down').addClass('icon-chevron-up');
            $(this).parent().parent().find('.table tbody').show();
        }, function() {
            $(this).addClass('icon-chevron-down').removeClass('icon-chevron-up');
            $(this).parent().parent().find('.table tbody').hide();
        });
 
    	
    	var sendingInput = false;
    	$(".inputSms").submit(function(e){

    		e.preventDefault();

    		if(!sendingInput)
	    	{
	    		sendingInput = true;
	    		var dataSms = null;
	    		
	    		/*bootbox.prompt({
	    			  title: "Mensaje de SMS a enviar:",
	    			  value: "Mensaje",
	    			  callback: function(result) {
	    			    if (result === null) {                           
	    			        Example.show("Prompt dismissed");     
	    			    } else {                           
	    			        Example.show("Prompt dismissed");     
	    			    }
	    			  }
	    		});*/
	    		bootbox.prompt("What is your name?", function(result) {                
	    			  if (result === null) {                                             
	    			    Example.show("Prompt dismissed");                              
	    			  } else {
	    			    Example.show("Hi <b>"+result+"</b>");                          
	    			  }
	    			});
	    		/*var textSms = prompt("Ingresa el texto del sms", "Texto inicial");
	    		if (textSms != null) {
	    			dataSms = textSms;
	    		}*/
	    		
	    		//Tenes que usar this para que traer el objeto que disparó el evento, o en realidad sobre el cual fue disparado, o sea, el formulario dado de submit
	    		var form = $(this).get(0);
				var formObj = $(form);
				var formURL = formObj.attr("action");
				
				
				$.ajax({
					type: "POST",
					url: formURL,
					data: {smsText: dataSms},
					cache: false,
					error: function(jqXHR, textStatus, errorThrown)
			        {
						console.log(data);
			        	alert("No se pudo enviar correctamente");
			        },
			        success: function(data)
			        {
			        	sendingInput = false;
			        	
			        	console.log(data.status);
			        	console.log(data.noticeMessage);
			            $(".sended").append(data.noticeMessage);
				           
			        }
			        	
		        });	  
	    	}//end if sending
    	});  

        //$('select').select2();
    });
})( jQuery );
