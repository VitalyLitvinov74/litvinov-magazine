<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * Class TableProductCards
 * @package app\tables
 * @property int $id [int(11)]
 * @property string $title [varchar(255)]  Наименование товара
 * @property string $description Полное описание товара
 * @property string $short_description Краткое описание товара
 */
class TableProductCards extends ActiveRecord
{
    public static function tableName()
    {
        return 'product_cards';
    }
}