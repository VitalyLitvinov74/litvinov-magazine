<?php

namespace app\shop\customers;

use app\models\GuidToken;
use app\shop\customers\behaviors\DefaultAddableCustomersBehavior;
use app\shop\customers\behaviors\WithCreateCartBehavior;
use app\shop\customers\behaviors\WithCreateWishlistBehavior;
use app\shop\customers\contracts\CustomersInterface;
use app\tables\TableCustomers;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;

class Customers implements CustomersInterface
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
        $behavior =
            new WithCreateWishlistBehavior(
                new WithCreateCartBehavior(
                    new DefaultAddableCustomersBehavior(
                        $this->token
                    )
                )
            );
        return $behavior->addToList();
    }
}