<? 
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); 
class vacancy extends CBitrixComponent { 
	public function executeComponent() { 
		global $DB;
		CModule::IncludeModule('employ');
		$u_employer_id = Employer::GetEmployerId();
		if(isset($_POST["v_date_from"])){
			$date = new DateTime($_POST["v_date_from"]);
			$date_from = date('d.m.Y H:i:s', $date->getTimestamp());
		}
		if(isset($_POST["v_date_to"])){		
			$date1 = new DateTime($_POST["v_date_to"]);
			$date_to = date('d.m.Y H:i:s', $date1->getTimestamp());
		}
		CModule::IncludeModule('iblock');
		$arFilter = array("ACTIVE" => $_POST["ACTIVE"], ">=DATE_CREATE" => $date_from, "<=DATE_CREATE" => $date_to, 'IBLOCK_ID' => $this->arParams['IBLOCK_TYPE']);
		$res = VacancyList::GetList($arFilter);
		while ($vacancyElement = $res->GetNextElement()) {
			$elementProp = $vacancyElement->GetProperties();
			$v_employer_id = $this->getPropertyValue($elementProp, 'employer_id');
			$el = $vacancyElement->GetFields();
			if (($this->arParams["EMPLOYER"] == "Y") && ( $v_employer_id == $u_employer_id ) || ($this->arParams["EMPLOYER"] == "N")){
				if(isset($_POST["ISRESPONSED"])){
					$resp_res = $DB->query("SELECT COUNT(*) FROM v_response WHERE vacancy_id = " . $el["ID"] ."");
					$resp_res = $resp_res->getNext();			
					if($resp_res['COUNT(*)'] == 0){
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
	public function getPropertyValue($field, $name){
		foreach ($field as $key => $value) {
			if ($value['NAME'] == $name){
				return $value['VALUE'];
			}
		}
	}
}; 
?>