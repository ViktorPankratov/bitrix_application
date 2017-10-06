<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true){
		die();
	}
	$arClasses = array(
	    'ResponsesCatalog\ResponseTable' => '/lib/response.php',
	    'Employer' => '/lib/employer.php',
	    'VacancyList' => '/lib/vacancy.php',
	);
	\Bitrix\Main\Loader::registerAutoLoadClasses("employ", $arClasses);
?>