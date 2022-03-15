<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * @property int $id         [int(11)]
 * @property int $product_id [int(11)]  id продукта из таблицы products
 * @property int $price      [int(11)]  Стоимость продукта с текущим аттрибутом
 * @property int $count      [int(11)]  кол-во товара которое осталось на складе, с текущим атрибутом
 */
class TableAttributesCollections extends ActiveRecord
{
    public static function tableName()
    {
        return 'attributes_collection';
    }
}