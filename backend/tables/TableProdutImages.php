<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * @property string $url        [varchar(255)]  относительный урл, изображения, без доменного имени
 * @property int    $created    [timestamp]  Дата создания
 * @property int    $updated    [timestamp]  Дата обновления
 * @property float  $product_models_id [double]  id продукта из таблицы models
 */
class TableProdutImages extends ActiveRecord
{
    public static function tableName()
    {
        return 'product_model_images';
    }
}