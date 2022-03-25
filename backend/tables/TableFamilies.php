<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * Class TableFamilies
 * @package app\tables
 * @property int $id [int(11)] - Кроме первичного ключа больше ничего нет.
 * @property string $title [varchar(255)]  Наименование товара
 * @property string $short_desc Краткое описание товара
 * @property string $desc полное описание товара
 */
class TableFamilies extends ActiveRecord
{
    public static function tableName()
    {
        return 'families';
    }

    public function rules()
    {
        return [
            ['id', 'exist', 'message' => "Не удалось найти семейство товаров с ид = " . $this->id]
        ];
    }
}