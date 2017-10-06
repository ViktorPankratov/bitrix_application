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
            new Entity\IntegerField('id', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\IntegerField('user_id'),
            new Entity\DateField('created'),         
            new Entity\IntegerField('vacancy_id'),
            new Entity\StringField('message', array(
                'required' => true
            )),
            new Entity\IntegerField('price_from'),
            new Entity\IntegerField('price_to')
        );
    }
}
?>