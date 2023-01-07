<?php

namespace app\tables;

/**
 *
 * @property int $id [int(11)]
 * @property int $customer_id [int(11)]
 */
class TableCarts extends BaseTable
{
    public static function tableName(): string
    {
        return 'carts';
    }
}