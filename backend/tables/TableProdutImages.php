<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * @property string $url        [varchar(255)]  относительный урл, изображения, без доменного имени
 * @property int    $created    [timestamp]  Дата создания
 * @property int    $updated    [timestamp]  Дата обновления
 * @property float  $product_id        [double]  id продукта из таблицы products
 */
class TableProdutImages extends ActiveRecord
{
    public static function tableName()
    {
        return 'product_images';
    }
}