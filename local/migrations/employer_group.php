<?

@set_time_limit(0);
@ignore_user_abort(true);

// Если инициализировать данную константу каким либо значением, то это запретит сбор статистики на данной странице.
define('NO_KEEP_STATISTIC', true);
// Если инициализировать данную константу значением "true" до подключения пролога, то это отключит проверку прав на доступ к файлам и каталогам.
define('NOT_CHECK_PERMISSIONS', true);
define('CHK_EVENT', true);
// При установке в true отключает выполнение всех агентов
define("NO_AGENT_CHECK", true);


// $_SERVER["DOCUMENT_ROOT"] = realpath(__DIR__ . '/../../');
$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
// Подключение пролога
require($DOCUMENT_ROOT . "/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");

// Создание группы Работодателей
$employerGroup = new CGroup;
$arFields = Array(
  "ACTIVE" => "Y",
  "C_SORT" => 10,
  "NAME" => "Работодатели",
  "DESCRIPTION" => "Администраторы вакансий",
  "STRING_ID" => "employers"
  );
$employerGroup->Add($arFields);
if (strlen($employerGroup->LAST_ERROR) > 0) {
    ShowError($employerGroup->LAST_ERROR);
}
?>