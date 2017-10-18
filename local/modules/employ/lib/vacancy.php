<?

class VacancyList
{
    function __construct() 
    {
        CModule::IncludeModule("iblock");
    }
    public function GetVacancyById($id, $arFields) 
    {
        $res = CIBlockElement::GetById($id);
   		$vacancyElement = $res->GetNextElement();
	    $elementProp = $vacancyElement->GetProperties();
	    $vacancy['ID'] = $id;
	    foreach ($arFields as $key => $value) {
	    	$vacancy[$key] = $this->getPropertyValue($elementProp, $value);
	    }
		return $vacancy;
    }
    public static function GetList($filter) 
    {
		$arSelect = array("ID", "IBLOCK_ID", "DETAIL_PAGE_URL");
		$arFilter = array($filter); 
		$arNavParams = array("nPageSize" => '10', "bDescPageNumbering" => 'Y', "bShowAll" => 'Y'); 
		$res = CIBlockElement::GetList(array(), $arFilter, false, $arNavParams, $arSelect); 
		return $res;
    }
    public function getPropertyValue($field, $name)
    {
		foreach ($field as $key => $value) {
			if ($value['NAME'] == $name){
				return $value['VALUE'];
			}
		}
	}
}