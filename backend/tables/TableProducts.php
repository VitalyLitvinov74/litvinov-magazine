<?php


namespace app\tables;


use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * Class TableProducts
 * @package app\tables
 * @property int $id    [int(11)]
 * @property int $count [int(11)]  Кол-во товара готового к продаже
 * @property int $price [int(11)]  Стоимость продукта умноженная на 100
 * @property TableProductCards $productCard
 * @property TableProductImages[] $images
 * @property TableProductCharacteristics[] $characteristics
 */
class TableProducts extends Table
{
    public static function tableName()
    {
        return 'products';
    }

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                'saveRelations'=>[
                    'relations'=>[
                        'characteristics'
                    ]
                ]
            ]
        );
    }

    public function rules()
    {
        return [
            ['id', 'exist', 'message' => 'Не удалось найти товар с указанным ID'],
            [['price', 'count'], 'safe']
        ];
    }

    public function getProductCard()
    {
        return $this
            ->hasOne(TableProductCards::class, ['id'=>'card_id'])
            ->viaTable('products_via_cards', ['product_id'=>'id']);
    }

    public function getCharacteristics(){
        return $this
            ->hasMany(TableProductCharacteristics::class, ['product_id'=>'id']);
    }
}