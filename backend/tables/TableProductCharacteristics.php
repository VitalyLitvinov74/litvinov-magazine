<?php


namespace app\tables;

/**
 * Class TableCharacteristics
 * @package app\tables
 * @property int    $id         [int(11)]
 * @property int    $product_id [int(11)]  id продукта которому пренадлежит характеристика
 * @property string $name       [varchar(255)]  Наименование характеристики
 * @property string $value      [varchar(255)]  Значение характеристики
 */
class TableProductCharacteristics extends BaseTable
{
    public static function tableName()
    {
        return 'products_characteristics';
    }

    public function fields()
    {
        $parent = parent::fields();
        unset($parent['productId']);
        return $parent;
    }

    public function rules()
    {
        return [
            [['name', 'value'], 'safe']
        ];
    }
}