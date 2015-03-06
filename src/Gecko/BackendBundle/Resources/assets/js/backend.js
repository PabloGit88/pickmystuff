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
	    		var dataSms = null;
	    		
	    		//Tenes que usar this para que traer el objeto que disparó el evento, o en realidad sobre el cual fue disparado, o sea, el formulario dado de submit
	    		var form = $(this).get(0);
				var formObj = $(form);
				var formURL = formObj.attr("action");
				
	    		bootbox.prompt({
	    			  title: "Mensaje de SMS a enviar:",
	    			  value: "Mensaje",
	    			  callback: function(result) {
	    			    if (result === null) {
	    			    	
	    			    } else {
	    			    	dataSms = result;    					
	    			    	sendingInput = true;
	    			    	
	    					$.ajax({
	    						type: "POST",
	    						url: formURL,
	    						data: {smsText: dataSms},
	    						cache: false,
	    						error: function(jqXHR, textStatus, errorThrown)
	    				        {
	    				        	alert("No se pudo enviar correctamente");
	    				        },
	    				        complete: function(){
	    				        	sendingInput = false;
	    				        },
	    				        success: function(data)
	    				        {
	    				            $(".sended").html(data.noticeMessage);
	    					           
	    				        }
	    				        	
	    			        });		    			    	
	    			    }
	    			  }//end callback
	    		});
	    	}//end if sending
    	});  

        //$('select').select2();
    });
})( jQuery );
