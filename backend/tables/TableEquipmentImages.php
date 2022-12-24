<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * Class TableProductImages
 * @package app\tables
 * @property int $id [int(11)]
 * @property string $path [varchar(255)]  Путь картинки, относительно корня домена api
 * @property int    $product_id [int(11)]  id из таблицы products
 */
class TableEquipmentImages extends ActiveRecord
{
    public static function tableName()
    {
        return 'equipment';
    }
}