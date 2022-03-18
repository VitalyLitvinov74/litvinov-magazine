<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * @property int $id           [int(11)]
 * @property string $vendor_code  [varchar(255)]  Артикул товара
 * @property int $count            [int(11)]  Кол-во товара на складе
 * @property int $price [int(11)]  Стоимость умноженная на 100, чтобы избавиться от дробной части
 */
class TableProducts extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }
}