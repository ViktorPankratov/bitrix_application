
<form action="index.php" method="POST" class="vacancy_list_filter_form">
	Показывать только 
	<button id="vacancy_list_filter_form_drop_filter_btn"><a href="<?=$APPLICATION->GetCurPage();?>">Сбросить фильтры</a></button>
	<div>Активные<input type="checkbox" name="ACTIVE" value="Y"></div>
	<div>С откликами<input type="checkbox" name="ISRESPONSED" value="Y"></div>
	<div>Дата от <input type="date" name="v_date_from" value="1970-01-01">
	до <input type="date" name="v_date_to" value="<?php echo date('Y-m-d'); ?>"></div>
	<input type="submit" value="Применить" id="vacancy_list_filter_form_submit">
</form>
<div class="wrapper">
<?
foreach ($arResult["VACANCIES"] as $value){
	?>
		<div class="vacancy_item">
			<span class="vacancy_item_name"><a href="<? echo $value["ID"];?>"><? echo $value["NAME"];?></a></span>
			<span class="vacancy_item_employer_price"><? echo $value["EMPLOYER"];?>, <? echo $value["PRICE"];?> &#8381</span>
			<div class="vacancy_item_description"><? echo $value["DESCRIPTION"];?></div>
			<div class="vacancy_item_need"><? echo $value["NEED"];?></div>
		</div>
	<?
}
?>
<div class="nav_panel"><?=$arResult["NAV_STRING"]?></div>
</div>