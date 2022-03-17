<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * @property int    $id           [int(11)]
 * @property string $vendor_code  [varchar(255)]  Артикул товара
 * @property int    $updated      [timestamp]  Дата обновления
 * @property int    $created      [timestamp]  Дата создания
 * @property string $title            Наименование товара
 * @property string $short_desc       [varchar(255)]  Краткое описание товара
 * @property string $descriptions     Описание товара
 * @property int    $default_price    [int(11)]  Цена умноженная на 100, чтобы не было копеек
 */
class TableProducts extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }
}