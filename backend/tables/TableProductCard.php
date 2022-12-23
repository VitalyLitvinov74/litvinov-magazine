<?php


namespace app\tables;


use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsTrait;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

/**
 * Class TableProductCards
 * @package app\tables
 * @property int $id                [int(11)]
 * @property string $title             [varchar(255)]  Наименование товара
 * @property string $description       Полное описание товара
 * @property string $short_description Краткое описание товара
 * @property TableProductImages[] $images
 * @property TableProducts[] $products
 * @property TableCharacteristics[] $characteristics
 */
class TableProductCard extends BaseTable
{
    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                'saveRelations' => [
                    'relations' => [
                        'products',
                        'characteristics'
                    ],
                ]
            ]
        );
    }

    public static function tableName()
    {
        return 'product_cards';
    }

    public function extraFields()
    {
        return ['products', 'characteristics'];
    }

    /**
     * @return ActiveQuery|TableProductImages[]
     * @throws InvalidConfigException
     */
    public function getImages()
    {
        return $this
            ->hasMany(TableProductImages::class, ['id' => 'image_id'])
            ->viaTable('product_images', ['product_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     * @throws InvalidConfigException
     */
    public function getProducts()
    {
        return $this
            ->hasMany(TableProducts::class, ['id' => 'product_id'])
            ->viaTable('products_via_cards', ['card_id' => 'id']);
    }

    public function getCharacteristics(): ActiveQuery
    {
        return $this
            ->hasMany(TableCharacteristics::class, ['id'=>'characteristic_id'])
            ->viaTable('product_cards_characteristics', ['card_id'=>'id']);
    }
}