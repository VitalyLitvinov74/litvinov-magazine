<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * Class TableFamiliesImages
 * @package app\tables
 * @property int $id                 [int(11)]
 * @property string $path            [varchar(255)]  Относительный путь до изображения
 */
class TableFamiliesImages extends ActiveRecord
{
    public static function tableName()
    {
        return 'images';
    }
}