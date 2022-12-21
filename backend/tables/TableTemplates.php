<?php
declare(strict_types=1);

namespace app\tables;

use yii\db\ActiveRecord;

/**
 * @property int $id [int(11)]
 * @property string $name [varchar(255)]
 */
class TableTemplates extends ActiveRecord
{
    public static function tableName()
    {
        return 'templates';
    }
}