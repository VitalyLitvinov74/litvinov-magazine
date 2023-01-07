<?php

namespace app\tables;

/**
 *
 * @property int $id [int(11)]  Покупателем может быть как Гость, так и зарегистрированный пользователь
 * @property string $token [varchar(255)]  Как только пользователь заходит на сайт он становится покупателем, ему присваивается уникальный токен.
 */
class TableCustomers extends BaseTable
{
    public static function tableName(): string
    {
        return 'customers';
    }
}