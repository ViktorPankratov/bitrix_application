<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
class VacancyDetail extends CBitrixComponent
{
	public function executeComponent()
	{
	    CModule::IncludeModule("iblock");
		CModule::IncludeModule("employ");
		$arFields = array("NAME" => 'Название', 
			"DESCRIPTION" => 'Описание', 
			"EMPLOYER" => 'Работодатель',
			"PRICE" =>'Зарплата',
			"NEED" => 'Требования',
			"DATE" => 'Дата создания'
		);
		$vl = new VacancyList;
		$this->arResult["VACANCY"] = $vl->GetVacancyById($_GET['ELEMENT_ID'], $arFields);
        $this->includeComponentTemplate();
    }
}