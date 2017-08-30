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