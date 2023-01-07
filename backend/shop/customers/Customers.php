<?php

namespace app\shop\customers;

use app\shop\customers\contracts\WeCustomers;
use app\tables\TableCustomers;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;

class Customers implements WeCustomers
{

    public function add(): TableCustomers
    {
        $record = new TableCustomers([
            'token' => bin2hex( openssl_random_pseudo_bytes(16) ) //uniq GUID
        ]);
        if ($record->save()) {
            return $record;
        }
        throw new NotSavedData($record->getErrors(), 403);
    }

    public function remove(IField $id): void
    {
        $record = TableCustomers::find()->where(['id' => $id->asInt()])->one();
        if ($record) {
            $record->delete();
        }
        throw new NotFoundEntity('Покупатель не был найден', "Удаление не завершено");
    }
}