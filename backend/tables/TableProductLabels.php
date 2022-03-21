<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * Class TableProductsFamilies
 * @package app\tables
 * @property int    $id         [int(11)]
 * @property string $title      [varchar(255)]  Наименование товара
 * @property string $short_desc Краткое описание товара
 * @property string $desc       полное описание товара
 */
class TableProductLabels extends ActiveRecord
{
    public static function tableName()
    {
        return 'labels'; // TODO: Change the autogenerated stub
    }
}