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
 * @property TableEquipmentImages[] $images
 * @property TableEquipments[] $equipments
 * @property TableCharacteristics[] $characteristics
 */
class TableProducts extends BaseTable
{
    public function behaviors(): array
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                'saveRelations' => [
                    'relations' => [
                        'equipments',
                        'characteristics'
                    ],
                ]
            ]
        );
    }

    public static function tableName(): string
    {
        return 'products';
    }

    public function extraFields(): array
    {
        return ['equipments', 'characteristics'];
    }

    /**
     * @return ActiveQuery
     * @throws InvalidConfigException
     */
    public function getEquipments(): ActiveQuery
    {
        return $this
            ->hasMany(TableEquipments::class, ['id' => 'equipment_id'])
            ->viaTable('product_via_equipments', ['product_id' => 'id']);
    }

    public function getCharacteristics(): ActiveQuery
    {
        return $this
            ->hasMany(TableCharacteristics::class, ['id'=>'characteristic_id'])
            ->viaTable('product_via_characteristics', ['product_id'=>'id']);
    }
}