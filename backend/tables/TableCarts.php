<?php

namespace app\tables;

use yii\db\ActiveQuery;

/**
 *
 * @property int $id [int(11)]
 * @property int $customer_id [int(11)]
 * @property string $token [varchar(255)]
 * @property  TableCustomers $customer
 * @property TableEquipments[] $equipments
 */
class TableCarts extends BaseTable
{
    public static function tableName(): string
    {
        return 'carts';
    }

    public function getCustomer(): ActiveQuery
    {
     return $this->hasOne(TableCustomers::class, ['id'=>'customer_id']);
    }

    public function getEquipments(): ActiveQuery
    {
        return $this->hasMany(TableEquipments::class, ['id'=>'equipment_id'])
            ->viaTable('carts_via_equipment', ['cart_id'=>'id']);
    }
}