<?
class VacancyAgent {
	public static function updateActive(){
		CModule::includeModule('iblock');
		$ID = 'vacancy'; 
		$IBLOCK_TYPE = 'vacancy';
		$arFilter = array("IBLOCK_TYPE" => $IBLOCK_TYPE, "ID" => $IBLOCK_ID);
		$res = CIBlockElement::GetList(array(), $arFilter, false, array(), array());
		while ($vacancyElement = $res->GetNextElement()){
			$vacancyElement = $vacancyElement->GetFields();
			if (isset($vacancyElement[ACTIVE_TO])){
				$currentDT = date("d.m.Y H:i:s");
				if($currentDT <= $vacancyElement[ACTIVE_TO]){
					$activity = array( "ACTIVE" => "N", );
					$updateVac = new CIBlockElement();
					$updateVac->Update($vacancyElement[ID], $activity);
				}
			}
		} 
	}
}