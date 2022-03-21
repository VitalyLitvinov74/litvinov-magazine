<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * Class TableFamilies
 * @package app\tables
 * @property int $id [int(11)] - Кроме первичного ключа больше ничего нет.
 */
class TableFamilies extends ActiveRecord
{
    public static function tableName()
    {
        return 'families';
    }
}