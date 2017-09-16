<?

@set_time_limit(0);
@ignore_user_abort(true);

define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
define('CHK_EVENT', true);
define("NO_AGENT_CHECK", true);


$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
require($DOCUMENT_ROOT . "/bitrix/modules/main/include/prolog_before.php");

global $DB;

$DB->Query("ALTER TABLE v_response ADD COLUMN price_from INTEGER AFTER message;");
$DB->Query("ALTER TABLE v_response ADD COLUMN price_to INTEGER AFTER price_from;");
?>
