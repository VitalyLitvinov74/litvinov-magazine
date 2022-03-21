<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * Class TableFamiliesImages
 * @package app\tables
 * @property int $products_family_id [int(11)]  это label_id из таблицы product_labels
 * @property int $image_id           [int(11)]  id из таблицы images
 */
class TableFamiliesImages extends ActiveRecord
{
    public static function tableName()
    {
        return 'families_images';
    }
}