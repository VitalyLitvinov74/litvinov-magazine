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

    public function remove(IField $token): void
    {
        $record = TableCustomers::find()->where(['token' => $token->asString()])->one();
        if ($record) {
            $record->delete();
            return;
        }
        throw new NotFoundEntity('Покупатель не был найден', "Удаление не завершено");
    }

    public function addByForm(IForm $customerForm = null): TableCustomers
    {
       $record = new TableCustomers($customerForm->validatedFields());
       return $this->saveRecord($record);
    }

    public function addDefault(): TableCustomers
    {
        $record = new TableCustomers([
            'token' => bin2hex( openssl_random_pseudo_bytes(16) ), //uniq GUID
            'cart' => [
                'null'
            ]
        ]);
        return $this->saveRecord($record);
    }

    private function saveRecord(TableCustomers $record): TableCustomers{
        if ($record->save()) {
            return $record;
        }
        throw new NotSavedData($record->getErrors(), 403);
    }
}