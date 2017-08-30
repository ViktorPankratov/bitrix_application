<? 
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); 
class vacancy extends CBitrixComponent { 
	public function executeComponent() { 
		CModule::IncludeModule('iblock'); 
		$IBLOCK_ID = $this->arParams['IBLOCK_ID']; 
		$IBLOCK_TYPE = $this->arParams['$IBLOCK_TYPE']; 
		$PAGER_TITLE = 'Вакансии'; 
		$arSelect = array("ID", "IBLOCK_ID", "DETAIL_PAGE_URL");
		$arFilter = array("IBLOCK_TYPE" => $IBLOCK_TYPE, "IBLOCK_ID" => $IBLOCK_ID); 
		$arNavParams = array("nPageSize" => '10', "bDescPageNumbering" => 'Y', "bShowAll" => 'Y'); 
		$res = CIBlockElement::GetList(array(), $arFilter, false, $arNavParams, $arSelect); 
		while ($vacancyElement = $res->GetNextElement()) {
			$elementProp = $vacancyElement->GetProperties();
			$el = $vacancyElement->GetFields();
			$vacancy = array( 
				"ID" => $el["ID"],
				"NAME" => $elementProp[70]["VALUE"], 
				"DESCRIPTION" => $elementProp[71]["VALUE"], 
				"EMPLOYER" => $elementProp[72]["VALUE"],
				"PRICE" => $elementProp[73]["VALUE"],
				"NEED" => $elementProp[74]["VALUE"],
				"DATE" => $elementProp[75]["VALUE"]
			);
			$this->arResult["VACANCIES"][] = $vacancy;
		} 
		$this->arResult["NAV_STRING"] = $res->GetPageNavStringEx($navComponentObject, $PAGER_TITLE, '', true); 
		$this->includeComponentTemplate();
	} 
}; 
?>