<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * @property float  $product_id [double]  id продукта из таблицы products
 * @property string $url        [varchar(255)]  относительный урл, изображения, без доменного имени
 * @property int    $created    [timestamp]  Дата создания
 * @property int    $updated    [timestamp]  Дата обновления
 */
class TableProdutImages extends ActiveRecord
{
    public static function tableName()
    {
        return 'product_images';
    }
}