<div id="send_resp_info"></div>
<div id="responseBtnWrap"></div>
<div id="response"> 
	<span id="modal_label">Откликнуться на вакансию</span>
	<span id="modal_close">X</span>
    <form method="POST">
    	<div class="excited_price">
		<a>Желаемая зарплата :</a>
			от <input type="text" id="price_from" class="price_field" maxlength="15" onkeypress="if((event.keyCode < 48)||(event.keyCode > 57)) event.returnValue=false"/>
			до <input type="text" id="price_to" class="price_field" maxlength="15" onkeypress="if((event.keyCode < 48)||(event.keyCode > 57)) event.returnValue=false"/> &#8381
		</div>
		<input type="hidden" id="idVacancy" name="v_id" value="<? echo $arResult["VACANCY"]["ID"]; ?>" />
		<input type="hidden" id= "idUser" name="u_id" value="<? echo $USER->getID() ?>" />
		<textarea id="resp_text" name="r_text" maxlength="2000" placeholder="Введите текст сообщения(не более 2000 символов)"></textarea>		
		<input id="resp_button" type="button" value="Откликнуться" />
	</form>	
</div>
<div id="overlay"></div>
<? echo $arResult["VACANCY"]["NAME"];?><br>
<? echo $arResult["VACANCY"]["DESCRIPTION"];?><br>
<? echo $arResult["VACANCY"]["EMPLOYER"];?><br>
<? echo $arResult["VACANCY"]["PRICE"];?><br>
<? echo $arResult["VACANCY"]["NEED"];?><br>
<a href="./">К остальным вакансиям</a>

<? $this->addExternalCss("style.css"); ?>
<? $this->addExternalJS("script.js"); ?>