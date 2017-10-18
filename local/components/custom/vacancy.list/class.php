<? 
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); 
use Bitrix\Main\Entity;

class Vacancy extends CBitrixComponent 
{ 
	public function executeComponent() 
	{ 
		global $DB;
		global $USER;
		CModule::IncludeModule("employ");
		if ($this->arParams["EMPLOYER"] == "Y"){
			$arFilter = array(
				"IBLOCK_TYPE" => $this->arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $this->arParams["EMPLOYER_IBLOCK_ID"],
			);
			$userEmployerId = Employer::GetEmployerIdByUser($USER, $arFilter);
		}		
		if($_POST["v_date_from"]){
			$date = new DateTime($_POST["v_date_from"]);
			$dateFrom = date('d.m.Y', $date->getTimestamp());
		}
		if($_POST["v_date_to"]){		
			$date1 = new DateTime($_POST["v_date_to"]);
			$dateTo = date('d.m.Y', $date1->getTimestamp());
		}
		if($_POST["active"] == "on"){
			$active = "Y";
		}
		$arFilter = array(
			"ACTIVE" => $active,
			">=DATE_CREATE" => $dateFrom,
			"<=DATE_CREATE" => $dateTo,
			"IBLOCK_TYPE" => $this->arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $this->arParams["IBLOCK_ID"]
		);
		CModule::IncludeModule("iblock");
		$res = VacancyList::GetList($arFilter);
		while ($vacancyElement = $res->GetNextElement()) {
			$elementProp = $vacancyElement->GetProperties();
			$vEmployerId = $this->getPropertyValue($elementProp, 'EMPLOYER_ID');
			$el = $vacancyElement->GetFields();
			if (($this->arParams["EMPLOYER"] == "Y") && ( $vEmployerId == $userEmployerId ) || ($this->arParams["EMPLOYER"] == "N")){
				if(isset($_POST["isresponsed"])){
					$respRes = ResponsesCatalog\ResponseTable::GetList(array(
				    	'select' => array('CNT'),
					    'runtime' => array(new Entity\ExpressionField('CNT', 'COUNT(*)')),
				    	'filter' => array('=VACANCY_ID' => $el["ID"]),
					));
					$respRes = $respRes->Fetch();
					if($respRes["CNT"] == 0){
						break;
					}
				}
				$vacancy = array( 
						"ID" => $el["ID"],
						"NAME" => $this->getPropertyValue($elementProp, 'Название'), 
						"DESCRIPTION" => $this->getPropertyValue($elementProp, 'Описание'), 
						"EMPLOYER" => $this->getPropertyValue($elementProp, 'Работодатель'),
						"PRICE" => $this->getPropertyValue($elementProp, 'Зарплата'),
						"NEED" => $this->getPropertyValue($elementProp, 'Требования'),
						"DATE" => $this->getPropertyValue($elementProp, 'Дата создания')
					);
				$this->arResult["VACANCIES"][] = $vacancy;
			}
		}
		$this->arResult["NAV_STRING"] = $res->GetPageNavStringEx($navComponentObject, $PAGER_TITLE, '', true); 
		$this->includeComponentTemplate();
	} 
	public function getPropertyValue($field, $name)
	{
		foreach ($field as $key => $value) {
			if ($value['NAME'] == $name){
				return $value['VALUE'];
			}
		}
	}
}; 
?>