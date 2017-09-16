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
	    var close = $('#modal_close, #overlay, #resp_button');
	    var modal = $('#response');
	    var send = $('#resp_button');
		 open.click( function(event){
		     event.preventDefault();
		     var div = $(this).attr('href');
		     overlay.fadeIn(400,
		         function(){ // пoсле oкoнчaния пoкaзывaния oверлэя
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

	     send.click(function(){
	     	vacid = $("#idVacancy").val();
	     	uid = $("#idUser").val();
	     	rtext = $("#resp_text").val();
			$.ajax({
				url: "/local/helpers/response/add_response.php",
				dataType: "json",
				type: "post",
				data: { v_id : vacid,
				 		u_id : uid,
				 		r_text : rtext
				}
			}).done(function(info){
				$('#send_resp_info').css('display', 'block');
				$('#send_resp_info').append(info);
			});
		 });
	});
});