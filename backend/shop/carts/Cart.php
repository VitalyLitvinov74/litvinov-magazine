<?php

namespace app\shop\carts;

use app\shop\carts\contracts\ICart;
use app\tables\TableCarts;
use app\tables\TableCustomers;
use app\tables\TableEquipments;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;

class Cart implements ICart
{
    private $_record = false;

    public function __construct(private IField $cartToken)
    {
    }

    public function addEquipment(IForm $addToCartForm): void
    {
        $validatedFields = $addToCartForm->validatedFields();
        $equipmentRecord = TableEquipments::find()
            ->where(['id' => $validatedFields['equipmentId']])
            ->one();
        $exceptionTitle = 'Не удалось добавить продукт в корзину';
        if (!$equipmentRecord) {
            throw new NotFoundEntity(
                'Продукт не найден',
                $exceptionTitle
            );
        }
        $cardRecord = TableCarts::find()
            ->joinWith('customer customer', false)
            ->where([
                'carts.token'=>$this->cartToken->asString(),
                'customer.token'=> $validatedFields['customerToken']
            ])
            ->one();
        if(!$cardRecord){
            throw new NotFoundEntity(
                'Корзина не найдена',
                $exceptionTitle
            );
        }
        $cardRecord->link(
            'equipments',
            $equipmentRecord
        );
    }

    public function removeEquipment(IField $equipmentId): void
    {

    }

    private function cartRecord(): TableCarts
    {
        if ($this->_record) {
            $record = TableCustomers::find()
                ->where(['token' => $this->customerToken->asString()])
                ->one()->cart;
        }
        return $this->_record;
    }
}