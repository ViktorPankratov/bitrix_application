<?

Class employ extends CModule
{
	var $MODULE_ID = 'employ';
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $strError = '';

	function __construct()
	{
		$arModuleVersion = array();
		include(__DIR__."/version.php");
		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		$this->MODULE_NAME = "Работодательство";
		$this->MODULE_DESCRIPTION = "Модуль для управления вакансиями работодателей";
	}
	function InstallFiles()
	{
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/local/modules/employ", $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/employ", true, true);
		// CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/employ/install/components", $_SERVER["DOCUMENT_ROOT"]."/bitrix/components", true, true);
		return true;
	}
	function InstallDB()
	{
		\Bitrix\Main\Application::getConnection()->queryExecute("CREATE TABLE IF NOT EXISTS v_response(
		   ID INTEGER NOT NULL auto_increment,
		   USER_ID INTEGER NOT NULL,
		   CREATED TIMESTAMP NOT NULL,
		   VACANCY_ID INTEGER NOT NULL,
		   MESSAGE TEXT,
		   PRICE_FROM INTEGER,
		   PRICE_TO INTEGER,
		   PRIMARY KEY(ID))
		   ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;");
	}
	function UnInstallFiles()
	{
		DeleteDirFiles("/bitrix/modules/employ");
		// DeleteDirFiles("/bitrix/components/employ/response.list");
		return true;
	}
	function UnInstallDB()
	{
		\Bitrix\Main\Application::getConnection()->queryExecute("DROP TABLE IF EXISTS v_response");
	}
	function DoInstall()
	{
		global $DOCUMENT_ROOT, $APPLICATION;
		RegisterModule("employ");
		$this->InstallFiles();
		$this->InstallDB();
		$APPLICATION->IncludeAdminFile("Установка модуля employ", $DOCUMENT_ROOT."/bitrix/modules/employ/install/step.php");
	}
	function DoUninstall()
	{
		global $DOCUMENT_ROOT, $APPLICATION;
		$this->UnInstallFiles();
		// $this->UnInstallDB();
		UnRegisterModule("employ");
		$APPLICATION->IncludeAdminFile("Деинсталляция модуля employ", $DOCUMENT_ROOT."/bitrix/modules/employ/install/unstep.php");
	}
}