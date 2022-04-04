<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * Class TableImages
 * @package app\tables
 * @property int $id [int(11)]
 * @property string $path [varchar(255)]  Путь картинки, относительно корня домена api
 */
class TableImages extends ActiveRecord
{
    public static function tableName()
    {
        return 'images';
    }
}