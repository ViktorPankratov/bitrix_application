<?
use Bitrix\Main\Entity;
class Employer extends Entity\DataManager{    
    public static function GetEmployerId() {
        global $USER;
        $cur_user = CUser::GetByID($USER->GetID());
        $cur_user = $cur_user->getNext();
        return $cur_user['employer_id'];
    }
}
?>