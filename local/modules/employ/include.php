<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true){
		die();
	}
	$arClasses = array(
	    'ResponsesCatalog\ResponseTable' => '/lib/response.php',
	);
	\Bitrix\Main\Loader::registerAutoLoadClasses("employ", $arClasses);
?>