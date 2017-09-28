<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?$APPLICATION->IncludeComponent("custom:vacancy","", array("SEF_FOLDER" => "/vacancies/", "EMPLOYER" => "N"));?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>