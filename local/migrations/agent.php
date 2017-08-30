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

CModule::IncludeModule("main");

CAgent::AddAgent(
    "VacancyAgent::updateActive();", // имя функции
    "main",                          // идентификатор модуля
    "N",                                  // агент не критичен к кол-ву запусков
    86400,                                // интервал запуска - 1 сутки
    "",                // дата первой проверки на запуск
    "Y",                                  // агент активен
    "");