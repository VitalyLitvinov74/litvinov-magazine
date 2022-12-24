<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * @property int $id [int(11)]
 * @property string $name [varchar(255)]
 * @property string $value [varchar(255)]
 */
class TableCharacteristics extends BaseTable
{
    public static function tableName()
    {
        return 'characteristics';
    }
}