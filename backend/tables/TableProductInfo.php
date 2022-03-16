<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * @property int    $product_id  [int(11)]  id продукта из таблицы products
 * @property string $type        Тип характеристики, например тип ткани, вес, размер
 * @property string $description Значение характеристики, например 500гр, или 10 x 10 x 15 cm
 */
class TableProductInfo extends ActiveRecord
{
    public static function tableName()
    {
        return 'product_info';
    }
}