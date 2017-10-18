<?
namespace ResponsesCatalog;

use Bitrix\Main\Entity;

class ResponseTable extends Entity\DataManager{
    public static function getTableName(){
        return 'v_response';
    }
    
    public static function getUfId(){
        return 'RESPONSE';
    }

    public static function getMap(){
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\IntegerField('USER_ID'),
            new Entity\DateField('CREATED'),         
            new Entity\IntegerField('VACANCY_ID'),
            new Entity\StringField('MESSAGE', array(
                'required' => true
            )),
            new Entity\IntegerField('PRICE_FROM'),
            new Entity\IntegerField('PRICE_TO')
        );
    }
}
?>