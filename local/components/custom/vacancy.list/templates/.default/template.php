
<form action="index.php" method="POST">
	Активные<input type="checkbox" name="ACTIVE" value="Y">
	С откликами<input type="checkbox" name="ISRESPONSED" value="Y"><br>
	Дата от <input type="date" name="v_date_from" value="1970-01-01">
	до <input type="date" name="v_date_to" value="<?php echo date('Y-m-d'); ?>"><br>
	<input type="submit" value="Применить">
</form>
<button><a href="<?=$APPLICATION->GetCurPage();?>">Сбросить фильтры</a></button>
<?
foreach ($arResult["VACANCIES"] as $value){
	?>
		<div>
			<a href="<? echo $value["ID"];?>"><? echo $value["NAME"];?></a><br>
			<? echo $value["DESCRIPTION"];?><br>
			<? echo $value["EMPLOYER"];?><br>
			<? echo $value["PRICE"];?><br>
			<? echo $value["NEED"];?>
		</div>
	<?
}
?>
<?=$arResult["NAV_STRING"]?>