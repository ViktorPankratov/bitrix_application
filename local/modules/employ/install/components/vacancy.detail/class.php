<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
class vacancyDetail extends CBitrixComponent{
	public function executeComponent(){
	    CModule::IncludeModule('iblock');
   		$res = CIBlockElement::GetById($_GET[ELEMENT_ID]);
   		$vacancyElement = $res->GetNextElement();
	    // print_r($vacancyElement);
	    $elementProp = $vacancyElement->GetProperties();
		$vacancy = array( 
			"ID" => $_GET[ELEMENT_ID],
			"NAME" => $elementProp[70]["VALUE"], 
			"DESCRIPTION" => $elementProp[71]["VALUE"], 
			"EMPLOYER" => $elementProp[72]["VALUE"],
			"PRICE" => $elementProp[73]["VALUE"],
			"NEED" => $elementProp[74]["VALUE"],
			"DATE" => $elementProp[75]["VALUE"]
			);
		$this->arResult["VACANCY"] = $vacancy;
        $this->includeComponentTemplate();
    }
}