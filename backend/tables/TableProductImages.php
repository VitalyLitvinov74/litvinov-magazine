<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * Class TableProductImages
 * @package app\tables
 * @property int $product_id [int(11)]
 * @property int $image_id [int(11)]
 */
class TableProductImages extends ActiveRecord
{
    public static function tableName()
    {
        return 'product_images';
    }
}