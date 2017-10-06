<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?
	
	$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
	require($DOCUMENT_ROOT . "/bitrix/modules/main/include/prolog_before.php");
	
	CModule::IncludeModule("iblock");
	$arSelect = array("ID", "IBLOCK_ID", "DETAIL_PAGE_URL", "PROPERTY_CODE", "NAME");
	$arFilter = array("IBLOCK_TYPE" => 'vacancy', "IBLOCK_ID" => 12); 
	$arNavParams = array("nPageSize" => '10', "bDescPageNumbering" => 'Y', "bShowAll" => 'Y'); 
	$res = CIBlockElement::GetList(array(), $arFilter, false, $arNavParams, $arSelect);
	while ($vacancyElement = $res->GetNextElement()) {
		$elementProp = $vacancyElement->GetProperties();
		$el = $vacancyElement->GetFields();
		foreach ($elementProp as $key => $value){
			if ($value['NAME'] == 'Название'){
				$v_name[$el['ID']] = $value['VALUE'];
			}
		}
    }

 //    if(isset($_POST["v_date_from"])){
	// 	$date = new DateTime($_POST["v_date_from"]);
	// 	$date_from = date('d.m.Y H:i:s', $date->getTimestamp());
	// }
	// if(isset($_POST["v_date_to"])){		
	// 	$date1 = new DateTime($_POST["v_date_to"]);
	// 	$date_to = date('d.m.Y H:i:s', $date1->getTimestamp());
	// }

	CModule::IncludeModule("employ");
	$res = ResponsesCatalog\ResponseTable::GetList(array(
    	'select' => array('user_id', 'vacancy_id', 'created', 'message', 'price_from', 'price_to'),
    	// 'filter' => array('>=DATE_CREATE' => $date_from, '<=DATE_CREATE' => $date_to),
    	'limit' => 20,
    	'offset' => 120
	));
	$el = $res->fetchAll();

	foreach ($el as $key => $value) {
	 	$user_resp = CUSER::GetByID($value['user_id']);
		$user_resp = $user_resp->GetNext();
		$response = array(
			"USER_NAME" => $user_resp['LOGIN'],
			"VAC_NAME" => $v_name[$value['vacancy_id']],
			"DATETIME" => $value['created'],
			"MESSAGE" => $value['message'],
			"PRICE_FROM" => $value['price_from'],
			"PRICE_TO" => $value['price_to']
		);
		$arResult["RESPONSES"][] = $response;
	 }
?>

<!-- <form action="index.php" method="POST">
	Дата от <input type="date" name="v_date_from" value="1970-01-01">
	до <input type="date" name="v_date_to" value="<?php echo date('Y-m-d'); ?>"><br>
	<input type="submit" value="Применить">
</form> -->


<div class="wrapper">
	<? 
		foreach ($arResult["RESPONSES"] as $value){
			?>
				<div class="response_item">					
					<span class="response_item_name"><? echo $value["VAC_NAME"];?></span>
					<span class="response_item_price"><? echo $value["PRICE_FROM"];?> - <? echo $value["PRICE_TO"];?></span>
					<div class="response_item_message"><? echo $value["MESSAGE"];?></div>					
					<div class="response_item_datetime_and_author"><? echo $value["DATETIME"];?>, <? echo $value["USER_NAME"];?></div>
				</div>
			<?
		}
	?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>