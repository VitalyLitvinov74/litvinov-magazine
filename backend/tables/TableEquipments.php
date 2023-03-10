<?php


namespace app\tables;


use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

/**
 * Class TableProducts
 * @package app\tables
 * @property int $id    [int(11)]
 * @property int $count [int(11)]  Кол-во товара готового к продаже
 * @property int $price [int(11)]  Стоимость продукта умноженная на 100
 * @property TableProducts $productCard
 * @property TableCharacteristics[] $characteristics
 * @property TableBooking $booking
 * @property string $name [varchar(255)]  Краткое название комплектации
 */
class TableEquipments extends BaseTable
{
    public static function tableName(): string
    {
        return 'equipments';
    }

    public function behaviors(): array
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                'saveRelations' => [
                    'relations' => [
                        'characteristics'
                    ]
                ]
            ]
        );
    }

    public function rules(): array
    {
        return [
            ['id', 'exist', 'message' => 'Не удалось найти товар с указанным ID']
        ];
    }

    public function extraFields()
    {
        return ['characteristics'];
    }

    public function getProductCard()
    {
        return $this
            ->hasOne(TableProducts::class, ['id' => 'product_id'])
            ->viaTable('product_via_equipments', ['equipment_id' => 'id']);
    }

    public function getCharacteristics(): ActiveQuery
    {
        return $this
            ->hasMany(TableCharacteristics::class, ['id' => 'characteristic_id'])
            ->viaTable('equipment_via_characteristics', ['equipment_id' => 'id']);
    }

    public function getCarts(): ActiveQuery
    {
        return $this
            ->hasMany(TableCarts::class, ['id' => 'cart_id'])
            ->viaTable('carts_via_equipment', ['equipment_id' => 'id']);
    }

    public function getBooking(): ActiveQuery
    {
        return $this->hasMany(TableBooking::class, ['equipment_id' => 'id']);
    }
}