<?
class Employer
{    
    public static function GetEmployerIdByUser($user, $arFilter) 
    {
        CModule::IncludeModule("iblock");
		$userID = $user->GetID();
		$arSelect = array("ID", "IBLOCK_ID", "DETAIL_PAGE_URL");
		$arNavParams = array("nPageSize" => '10', "bDescPageNumbering" => 'Y', "bShowAll" => 'Y'); 
		$res = CIBlockElement::GetList(array(), $arFilter, false, $arNavParams, $arSelect); 
		$element = $res->GetNextElement();
		$elementProp = $element->GetFields();
		return $elementProp["ID"];      
    }
    public static function currentUserIsEmployer(){
    	global $USER;
		$current_user = $USER->getID();
		$arGroupsId = CUser::GetUserGroup($current_user);
		foreach ($arGroupsId as $key => $value) {
			$arGroups = CGroup::GetByID($value);
			$arGroups = $arGroups->fetch();
			$arGroup_names[] = $arGroups['STRING_ID'];
		}
		if (in_array('employers', $arGroup_names)){
			return true;
		}
		return false;
    }
}
?>