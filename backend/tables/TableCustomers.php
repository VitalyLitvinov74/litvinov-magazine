<?php

namespace app\tables;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsTrait;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 *
 * @property int $id [int(11)]  Покупателем может быть как Гость, так и зарегистрированный пользователь
 * @property string $token [varchar(255)]  Как только пользователь заходит на сайт он становится покупателем, ему присваивается уникальный токен.
 * @property  TableCarts cart
 */
class TableCustomers extends BaseTable
{
    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                'saveRelations' => [
                    'relations' => [
                        'cart'
                    ]
                ]
            ]
        );
    }

    public function extraFields(): array
    {
        return ['cart'];
    }

    public static function tableName(): string
    {
        return 'customers';
    }

    public function getCart(): ActiveQuery
    {
        return $this->hasOne(TableCarts::class, [
            'customer_id' => 'id'
        ]);
    }
}