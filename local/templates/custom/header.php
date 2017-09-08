
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<!DOCTYPE html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<script src="<? echo SITE_TEMPLATE_PATH; ?>/js/jquery-3.2.1.js"></script>
	<?$APPLICATION->ShowHead()?>
	<title><?$APPLICATION->ShowTitle()?></title>
</head>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<header class="header">
		<nav class="top-menu">
		  <ul class="menu-main">
		    <li><a href="/">Главная</a></li>
		    <li><a href="/register.php">Регистрация</a></li>
		    <li><a href="/signin.php">Авторизация</a></li>
		    <li><a href="/vacancies/">Вакансии</a></li>
		  </ul>
		</nav>
</header>
