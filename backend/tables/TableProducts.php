<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * @property int    $id           [int(11)]
 * @property string $title        Наименование товара
 * @property string $descriptions Описание товара
 * @property string $vendor_code  [varchar(255)]  Артикул товара
 * @property int    $updated      [timestamp]  Дата обновления
 * @property int    $created      [timestamp]  Дата создания
 */
class TableProducts extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }
}