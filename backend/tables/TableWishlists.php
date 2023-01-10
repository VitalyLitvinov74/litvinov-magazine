<?php

namespace app\tables;

use yii\db\ActiveQuery;

/**
 *
 * @property int $id [int(11)]
 * @property int $customer_id [int(11)]
 * @property string $token [varchar(255)]
 */
class TableWishlists extends BaseTable
{
    public static function tableName(): string
    {
        return 'wishlists';
    }

    public function getCustomer(): ActiveQuery
    {
        return $this->hasOne(TableCustomers::class, ['id'=>'customer_id']);
    }
}