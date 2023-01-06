<?php
namespace app\tables;

/**
 * Class TableAuthIdentity
 * @package app\tables
 * @property int $id [int(11)]
 * @property int $user_id [int(11)]
 * @property int $account_id [int(11)]
 * @property string $access_token [varchar(255)]
 * @property string $created_at [datetime]
 * @property string $updated_at [datetime]
 */
class TableAuthIdentity extends BaseTable
{
    public static function tableName()
    {
        return 'auth_identity';
    }
}