<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * @property int    $id                [int(11)]
 * @property string $path              [varchar(255)]  Относительный путь до изображения
 */
class TableImages extends ActiveRecord
{
    public static function tableName()
    {
        return 'images';
    }
}