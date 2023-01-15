<?php
declare(strict_types=1);

namespace app\tables;

use yii\db\ActiveRecord;

/**
 *
 * @property int $id [int(11)]
 * @property int $cart_id [int(11)]
 * @property int $equipment_id [int(11)]
 * @property int $count [int(11)]
 */
class TableCartsViaEquipment extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'carts_via_equipment';
    }
}