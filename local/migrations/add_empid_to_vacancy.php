<?

@set_time_limit(0);
@ignore_user_abort(true);

define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
define('CHK_EVENT', true);
define("NO_AGENT_CHECK", true);


$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
require($DOCUMENT_ROOT . "/bitrix/modules/main/include/prolog_before.php");


CModule::IncludeModule("iblock");

$iBlock_list = CIBlock::Getlist();
while($block = $iBlock_list->getNext()){
  if($block['NAME'] == 'Вакансия'){
    $vacancy_block = $block;
  }
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
  "NAME" => "employer_id",
  "ACTIVE" => "Y",
  "SORT" => "600",
  "PROPERTY_TYPE" => "N",
  "IBLOCK_ID" => $vacancy_block['ID']
  );
addiBlockProperty($fields);
?>
