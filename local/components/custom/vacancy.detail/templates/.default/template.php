<? $this->addExternalJS("script.js"); ?>
<input type="hidden" id="idVacancy" value="<? echo $arResult["VACANCY"]["ID"]; ?>" />
<div id="responseBtnWrap">
	<script type="text/javascript">
		btn();
	</script>
	<script type="text/javascript">
		var Dialog = new BX.CDialog({
			title: "Откликнуться",
			head: 'Напишите текст отклика',
			content: '<form method="POST" style="overflow:hidden;" action="/local/helpers/response/add_response.php">\
				<input type="hidden" name="v_id" value="<? echo $arResult["VACANCY"]["ID"]; ?>" />\
				<input type="hidden" name="u_id" value="<? echo $USER->getID() ?>" />\
				<textarea name="r_text" style="height: 78px; width: 374px;" placeholder="Вот сюда"></textarea>\
				<input type="submit" value="Откликнуться" />\
				</form>',
			icon: 'head-block',
			resizable: true,
			draggable: true,
			height: '180',
			width: '400',
		});
		
	</script>
</div>
<? echo $arResult["VACANCY"]["NAME"];?><br>
<? echo $arResult["VACANCY"]["DESCRIPTION"];?><br>
<? echo $arResult["VACANCY"]["EMPLOYER"];?><br>
<? echo $arResult["VACANCY"]["PRICE"];?><br>
<? echo $arResult["VACANCY"]["NEED"];?><br>
<a href="./">К остальным вакансиям</a>