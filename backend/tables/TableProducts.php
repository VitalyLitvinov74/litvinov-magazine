<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * @property int    $id           [int(11)]
 * @property string $vendor_code  [varchar(255)]  Артикул товара
 * @property int    $updated      [timestamp]  Дата обновления
 * @property int    $created      [timestamp]  Дата создания
 * @property int    $product_model_id [int(11)]
 */
class TableProducts extends ActiveRecord
{
    public static function tableName()
    {
        return 'models';
    }
}