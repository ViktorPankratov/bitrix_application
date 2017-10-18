<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?
	use Bitrix\Main\Type;
	$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
	require($DOCUMENT_ROOT . "/bitrix/modules/main/include/prolog_before.php");
	
	CModule::IncludeModule("iblock");
	$arSelect = array("ID", "IBLOCK_ID", "DETAIL_PAGE_URL", "PROPERTY_CODE", "NAME");
	$arFilter = array("IBLOCK_TYPE" => "vacancy", "IBLOCK_ID" => "3"); 
	$arNavParams = array("nPageSize" => '10', "bDescPageNumbering" => 'Y', "bShowAll" => 'Y'); 
	$res = CIBlockElement::GetList(array(), $arFilter, false, $arNavParams, $arSelect);
	while ($vacancyElement = $res->GetNextElement()) {
		$elementProp = $vacancyElement->GetProperties();
		$el = $vacancyElement->GetFields();
		foreach ($elementProp as $key => $value){
			if ($value['NAME'] == 'Название'){
				$vacancyName[$el['ID']] = $value['VALUE'];
			}
		}
    }
    $arFilter = array();
    if($_POST["lf_by_login"]){
    	$userr = CUser::GetByLogin($_POST["lf_by_login"])->GetNext();
    	$arFilter['=USER_ID'] = $userr['ID'];
    }
    if($_POST["lf_by_vacancy"]){
    	foreach ($vacancyName as $key => $value) {
    		if($_POST["lf_by_vacancy"] == $value){
    			$arFilter['=VACANCY_ID'] = $key;
    			break;
    		}
    	}   	
    }
    if($_POST["r_date_from"]){
    	$arFilter[">=CREATED"] = new Type\Date($_POST["r_date_from"], 'Y-m-d');
    }
    if($_POST["r_date_to"]){
    	$arFilter["<=CREATED"] = new Type\Date($_POST["r_date_to"], 'Y-m-d');
    }
	CModule::IncludeModule("employ");
	$res = ResponsesCatalog\ResponseTable::GetList(array(
    	'select' => array('USER_ID', 'VACANCY_ID', 'CREATED', 'MESSAGE', 'PRICE_FROM', 'PRICE_TO'),
    	'filter' => $arFilter,
	));
	while($el = $res->Fetch()){
		$respUser = CUSER::GetByID($el['USER_ID']);
		$respUser = $respUser->GetNext();
		$response = array(
			"USER_NAME" => $respUser['LOGIN'],
			"VAC_NAME" => $vacancyName[$el['VACANCY_ID']],
			"DATETIME" => $el['CREATED'],
			"MESSAGE" => $el['MESSAGE'],
			"PRICE_FROM" => $el['PRICE_FROM'],
			"PRICE_TO" => $el['PRICE_TO']
		);
		$arResult["RESPONSES"][] = $response;
	}
?>

<form action="index.php" method="POST" class="response_list_filter_form">
	Показывать только
	<button id="response_list_filter_form_drop_filter_btn"><a href="<?=$APPLICATION->GetCurPage();?>">Сбросить фильтры</a></button>
	<div>От пользователя <br><input type="text" name="lf_by_login" value="<?=$_POST["lf_by_login"]?>"></div>
	<div>На вакансию <br><input type="text" name="lf_by_vacancy" value="<?=$_POST["lf_by_vacancy"]?>"></div><br>
	<div>Дата от <input type="date" name="r_date_from" value="<?=$_POST["r_date_from"]?>">
	до <input type="date" name="r_date_to" value="<?=$_POST["r_date_to"]?>"></div>
	<input type="submit" value="Применить" id="response_list_filter_form_submit">
</form>


<div class="wrapper">
	<? 
		foreach ($arResult["RESPONSES"] as $value){
			?>
				<div class="response_item">					
					<span class="response_item_name"><?=$value["VAC_NAME"]?></span>
					<span class="response_item_price"><?=$value["PRICE_FROM"]?> - <?=$value["PRICE_TO"]?> &#8381</span>
					<div class="response_item_message"><?=$value["MESSAGE"]?></div>					
					<div class="response_item_datetime_and_author"><?=$value["DATETIME"]?>, <?=$value["USER_NAME"]?></div>
				</div>
			<?
		}
	?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>