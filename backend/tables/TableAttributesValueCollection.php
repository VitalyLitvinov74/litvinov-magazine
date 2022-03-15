<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * Class TableAttributesValueCollection - связующая таблица
 * связывает между собой коллекцию, и значения атрибутов
 * @property int $collection_id      [int(11)]  id коллекции атрибутов из таблицы attributes_collection
 * @property int $attribute_value_id [int(11)]  id значения атрибута из таблицы product_attribute_values
 */
class TableAttributesValueCollection extends ActiveRecord
{
    public static function tableName()
    {
        return "attributes_values_attributes_collections";
    }
}