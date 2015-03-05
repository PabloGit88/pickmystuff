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
	    		
	    		var textSms = prompt("Ingresa el texto del sms", "Texto inicial");
	
	    		if (textSms != null) {
	    			dataSms = textSms;
	    		}
	    		
	    		var form = $("form.inputSms").get(0);
				var formObj = $(form);
				var formURL = formObj.attr("action");
				
				
				$.ajax({
					type: "POST",
					url: formURL,
					data: {smsText: dataSms},
					contentType: false,
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
			            $(".sended").append('enviado');
				           
			        }
			        	
		        });	  
	    	}//end if sending
    	});  

        //$('select').select2();
    });
})( jQuery );
