<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?$APPLICATION->IncludeComponent("custom:vacancy","", array("SEF_FOLDER" => "/vacancies/vacancy"));?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>