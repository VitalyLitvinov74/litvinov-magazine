<?php

namespace app\shop\customers;

use app\models\GuidToken;
use app\shop\customers\contracts\WeCustomers;
use app\tables\TableCustomers;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;

class Customers implements WeCustomers
{
    public function __construct(private IField $token = new GuidToken())
    {
    }

    public function remove(IField $token): void
    {
        $record = TableCustomers::find()->where(['token' => $token->asString()])->one();
        if ($record) {
            $record->delete();
            return;
        }
        throw new NotFoundEntity('Покупатель не был найден', "Удаление не завершено");
    }

    public function addToList(): TableCustomers
    {
        $record = new TableCustomers([
            'token' => $this->token->asString()
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