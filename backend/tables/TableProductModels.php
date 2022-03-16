<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * @property int    $id                [int(11)]
 * @property string $title             [varchar(255)]  Заголовок семейства товара
 * @property string $description       Описание семейства товара
 * @property string $short_description Краткое описание семейства товара
 * @property int    $created           [timestamp]  дата добавления
 * @property int    $updated           [timestamp]  дата обновления
 */
class TableProductModels extends ActiveRecord
{
    public static function tableName()
    {
        return "product_models";
    }
}