<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * Class TableProductsFamilies
 * @package app\tables
 * @property int $product_id     [int(11)]
 * @property int $label_id       [int(11)] - по сути это и есть ид семейства продуктов
 */
class TableProductsFamilies extends ActiveRecord
{
    public static function tableName()
    {
        return 'products_labels';
    }
}