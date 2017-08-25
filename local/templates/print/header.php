<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog.php");?>
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?$APPLICATION->ShowHead()?>
<title><?$APPLICATION->ShowTitle()?></title>
</head>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<h1><?$APPLICATION->ShowTitle(false)?></h1>