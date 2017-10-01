<div id="send_resp_info"></div>

<div id="response"> 
	<span id="modal_label">Откликнуться на вакансию</span>
	<span id="modal_close">X</span>
    <form method="POST" id="resp_form">
    	<div class="excited_price">
		<a>Желаемая зарплата :</a>
			от <input type="text" data-validation="number" id="price_from" class="price_field" maxlength="15"/>
			до <input type="text" data-validation="number" id="price_to" class="price_field" maxlength="15"/> &#8381
		</div>
		<input type="hidden" id="idVacancy" name="v_id" value="<? echo $arResult["VACANCY"]["ID"]; ?>" />
		<input type="hidden" id= "idUser" name="u_id" value="<? echo $USER->getID() ?>" />
		<textarea data-validation="length" data-validation-length="50-2000" id="resp_text" name="r_text" placeholder="Введите текст сообщения(от 50 до 2000 символов)"></textarea>		
		<input id="resp_button" type="submit" value="Откликнуться" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	</form>
</div>
<div id="overlay"></div>
<div class="wrapper">
	<div class="vacancy_item">	
		<span class="vacancy_item_name"><? echo $arResult["VACANCY"]["NAME"];?></span>   (<span id="responseBtnWrap"></span>)
		<span class="vacancy_item_employer_price"><? echo $arResult["VACANCY"]["EMPLOYER"];?>, <? echo $arResult["VACANCY"]["PRICE"];?> &#8381</span>
		<div class="vacancy_item_description"><? echo $arResult["VACANCY"]["DESCRIPTION"];?></div>	
		<div class="vacancy_item_need"><? echo $arResult["VACANCY"]["NEED"];?></div>
		<div class="vacancy_item_to_list_btn"><a href="./">К остальным вакансиям</a></div>
	</div>
</div>


<? $this->addExternalCss("style.css"); ?>
<? $this->addExternalJS("script.js"); ?>
