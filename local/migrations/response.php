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

$DB->Query("CREATE TABLE IF NOT EXISTS v_response(
   id INTEGER NOT NULL auto_increment,
   user_id INTEGER NOT NULL,
   created TIMESTAMP NOT NULL,
   vacancy_id INTEGER NOT NULL,
   message TEXT,
   PRIMARY KEY(id))
   ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;");
?>