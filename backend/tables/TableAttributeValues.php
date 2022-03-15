<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * @property int    $id         [int(11)]
 * @property string $value      [varchar(255)]
 * @property int    $product_id [int(11)]  id продукта к которому пренадлежит аттрибут
 */
class TableAttributeValues extends ActiveRecord
{
    public static function tableName()
    {
        return 'product_attribute_values';
    }
}