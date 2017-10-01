<?

use \Bitrix\Main;
use \Bitrix\Main\Entity;
use \Bitrix\Main\Type;
use \Employ\ResponseTable;

class ResponseList extends CBitrixComponent
{
	/**
	  * проверка подключения необходимых модулей
	  * @throws LoaderException
	  */
	protected function checkModules()
	{
		if (!Main\Loader::includeModule('employ'))
			throw new Main\LoaderException("Модуль работодательство не установлен");
	}

	public function executeCompontent()
	{
		$this->checkModules();
		ResponseTable::add(array(
			'message' => 'Module loaded'
		));

		$this->arResult = ResponseTable::GetList()->fetchAll();

		$this->includeComponentTemplate();
	}
}