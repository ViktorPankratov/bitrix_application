
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
		    <li><a href="/vacancies">Вакансии</a></li>
		    <?
			    global $USER;
				$current_user = $USER->getID();
				$arGroupsId = CUser::GetUserGroup($current_user);
				foreach ($arGroupsId as $key => $value) {
					$arGroups = CGroup::GetByID($value);
					$arGroups = $arGroups->fetch();
					$arGroup_names[] = $arGroups['STRING_ID'];
				}
				if (in_array('employers', $arGroup_names)){
					echo '<li class="vert-nav"><a href="#">Работодателю</a>
					    	<ul>
					    		<li><a href="/vacancies/vacancy">Вакансии</a></li>
						    	<li><a href="/vacancies/response">Отклики  </a></li>
						    </ul>
					    </li>';
				}
			?>		    
		  </ul>
		</nav>
</header>
<script type="text/javascript">
$(document).ready(function () {
 
  $('.vert-nav').hover(
    function() {
      $('ul', this).slideDown(110);
    },
    function() {
      $('ul', this).slideUp(110);
    }
  );
 
});
</script>
