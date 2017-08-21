<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?>

<?$APPLICATION->IncludeComponent(
	"custom:signup.form"
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>