<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?>

<?$APPLICATION->IncludeComponent(
	"custom:login"
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>