<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * Class TableProducts
 * @package app\tables
 * @property int $id    [int(11)]
 * @property int $count [int(11)]  Кол-во товара готового к продаже
 * @property int $price [int(11)]  Стоимость продукта умноженная на 100
 * @property TableProductCards $productCard
 * @property TableProductImages[] $images
 */
class TableProducts extends Table
{
    public static function tableName()
    {
        return 'products';
    }

    public function rules()
    {
        return [
            ['id', 'exist', 'message' => 'Не удалось найти товар с указанным ID']
        ];
    }

    public function getProductCard()
    {
        return $this
            ->hasOne(TableProductCards::class, ['id'=>'card_id'])
            ->viaTable('products_via_cards', ['product_id'=>'id']);
    }

    public function getImages()
    {
        return $this->hasMany(TableProductImages::class, ['product_id'=>'id']);
    }
}