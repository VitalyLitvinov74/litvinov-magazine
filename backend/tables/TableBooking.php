<?php
declare(strict_types=1);

namespace app\tables;

use yii\db\ActiveRecord;

/**
 *
 * @property int $id [int(11)]
 * @property int $count [int(11)]
 * @property int $equipment_id [int(11)]
 * @property int $customer_id [int(11)]
 */
class TableBooking extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'booking';
    }
}