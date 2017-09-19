$( window ).on( "load", function() {
	vacid = $("#idVacancy").val();
	$.ajax({
		url: "/local/ajax/get_respond_btn.php",
		dataType: "json",
		type: "get",
		data: { idv : vacid }
	}).done(function (response) {
		$("#responseBtnWrap").append(response);
		var overlay = $('#overlay');
	    var open = $('#open_modal');
	    var close = $('#modal_close, #overlay');
	    var modal = $('#response');
	    var send = $('#resp_button');
     	
     	$.validate({
		    onSuccess : function(){
		    	var vacid = $("#idVacancy").val();
		     	var uid = $("#idUser").val();
		     	var rtext = $("#resp_text").val();
		     	var price_from = $("#price_from").val();
		     	var price_to = $("#price_to").val();
				$.ajax({
					url: "/local/helpers/response/add_response.php",
					dataType: "json",
					type: "post",
					data: { v_id : vacid,
					 		u_id : uid,
					 		r_text : rtext,
					 		price_from : price_from,
					 		price_to : price_to
						  }
				}).done(function(info){
					$('#send_resp_info').css('display', 'block');
					$('#send_resp_info').append(info);
				});
				modal
	             .animate({opacity: 0, top: '50%'}, 200,
	                 function(){
	                     $(this).css('display', 'none');
	                     overlay.fadeOut(400);
	                 }
	             );
				return false;
		    }
		});


		 open.click( function(event){
		     event.preventDefault();
		     var div = $(this).attr('href');
		     overlay.fadeIn(400,
		         function(){
		             $(div)
		                 .css('display', 'block') 
		                 .animate({opacity: 1, top: '50%'}, 200);
		     });
		 });

	     close.click( function(){
             modal
             .animate({opacity: 0, top: '50%'}, 200,
                 function(){
                     $(this).css('display', 'none');
                     overlay.fadeOut(400);
                 }
             );
	     });
	});
});

