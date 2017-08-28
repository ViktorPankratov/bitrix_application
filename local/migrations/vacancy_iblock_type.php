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

//Создание типа инфоблока "Вакансии"
$arFields = Array(
	'ID' => 'vacancy',
	'SECTIONS' => 'Y',
	'IN_RSS' => 'N',
	'SORT' => 10,
	'LANG' => Array(
			'ru' => Array(
				'NAME' => 'Вакансии',
				'SECTION_NAME' => 'Разделы',
				'ELEMENT_NAME' => 'Вакансия'
			),
			'en' => Array(
				'NAME' => 'Vacancies',
				'SECTION_NAME' => 'Sections',
				'ELEMENT_NAME' => 'Vacancy'
			)
		)
    );

$vacanyBlockType = new CIBlockType;
$res = $vacanyBlockType->Add($arFields);
if(!$res) {
	$DB->Rollback();
	echo $vacanyBlockType->LAST_ERROR.'<br>';
} else {
	$DB->Commit();
}

?>