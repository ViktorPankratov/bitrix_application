function btn(){
	vacid = $("#idVacancy").val();
	$.ajax({
		url: "/local/ajax/get_respond_btn.php",
		dataType: "json",
		type: "get",
		data: { idv : vacid }
	}).done(function (response) {
			$("#responseBtnWrap").append(response);
	});
}