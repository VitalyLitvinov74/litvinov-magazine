<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * @property int    $id   [int(11)]
 * @property string $name [varchar(255)]  имя аттрибута
 */
class TableProductCharacteristics extends ActiveRecord
{
    public static function tableName()
    {
        return 'product_characteristics';
    }
}