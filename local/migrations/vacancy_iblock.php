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

//Создание инфоблока "Вакансии"
$iBlock = new CIBlock;
$fields = array(
  'ID' => 'vacancy',
  'LID' => 's1',
  'IBLOCK_TYPE_ID' => 'vacancy',
  'NAME' => 'Вакансия',
  'ACTIVE' =>'y',
  'SORT' => 100,
  'GROUP_ID' => array('2'=>'D', '3'=>'D', '4'=>'D', '5'=>'W')
  );
$iblock_id = $iBlock->Add($fields);
if (!$iblock_id) {
	echo 'Error: ' . $iBlock->LAST_ERROR;
	die();
}

function addiBlockProperty($fields)
{
    $iBlockProperty = new CiBlockProperty();
    $id = $iBlockProperty->add($fields);
    if (!$id) {
        echo 'Error: '.$iBlockProperty->LAST_ERROR;
    }
    return $id;
}

$fields = array(
  "NAME" => "Название",
  "ACTIVE" => "Y",
  "SORT" => "600",
  "PROPERTY_TYPE" => "S",
  "IBLOCK_ID" => $iblock_id
  );
addiBlockProperty($fields);
$fields = array(
  "NAME" => "Описание",
  "ACTIVE" => "Y",
  "SORT" => "600",
  "PROPERTY_TYPE" => "S",
  "IBLOCK_ID" => $iblock_id
  );
addiBlockProperty($fields);
$fields = array(
  "NAME" => "Работодатель",
  "ACTIVE" => "Y",
  "SORT" => "600",
  "PROPERTY_TYPE" => "S",
  "IBLOCK_ID" => $iblock_id
  );
addiBlockProperty($fields);
$fields = array(
  "NAME" => "Зарплата",
  "ACTIVE" => "Y",
  "SORT" => "600",
  "PROPERTY_TYPE" => "N",
  "IBLOCK_ID" => $iblock_id
  );
addiBlockProperty($fields);
$fields = array(
  "NAME" => "Требования",
  "ACTIVE" => "Y",
  "SORT" => "600",
  "PROPERTY_TYPE" => "S",
  "IBLOCK_ID" => $iblock_id
  );
addiBlockProperty($fields);
 $fields = array(
  "NAME" => "Дата создания",
  "ACTIVE" => "Y",
  "SORT" => "600",
  "PROPERTY_TYPE" => "S",
  "USER_TYPE" => "DateTime",
  "IBLOCK_ID" => $iblock_id
  );
addiBlockProperty($fields);
$fields = array(
  "NAME" => "Файл",
  "ACTIVE" => "Y",
  "SORT" => "600",
  "PROPERTY_TYPE" => "F",
  "IBLOCK_ID" => $iblock_id
  );
addiBlockProperty($fields);

?>