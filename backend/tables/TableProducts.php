<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * Class TableProducts
 * @package app\tables
 * @property int    $id          [int(11)]
 * @property int    $price       [int(11)]  Стоимость умноженная на 100, чтобы избавиться от дробной части
 * @property int    $count       [int(11)]  Кол-во товара на складе
 * @property string $vendor_code [varchar(255)]  Артикул товара
 */
class TableProducts extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }
}