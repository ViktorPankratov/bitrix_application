<?
$arParams['SEF_MODE'] = 'Y';
$arComponentVariables = array();
$arDefaultUrlTemplates = array(
    "index" => "index.php",
    "detail" => "#ELEMENT_ID#",
);

$arVariables = array();
$arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates($arDefaultUrlTemplates, $arParams['SEF_URL_TEMPLATES']);
$componentPage = CComponentEngine::ParseComponentPath($arParams['SEF_FOLDER'], $arUrlTemplates, $arVariables);

$arResult = array('VARIABLES' => $arVariables, 'ALIASES' => $arVariableAliases);
$arResult['PATH_TO_INDEX'] = $arParams['SEF_FOLDER'].$arParams['SEF_URL_TEMPLATES']['index'];
$arResult['PATH_TO_DETAIL'] = $arParams['SEF_FOLDER'].$arParams['SEF_URL_TEMPLATES']['detail'];

$this->IncludeComponentTemplate($componentPage);
?> 