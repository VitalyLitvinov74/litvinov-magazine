<?php

namespace app\shop\carts;

use app\shop\carts\contracts\ICart;
use app\tables\TableCarts;
use app\tables\TableCustomers;
use app\tables\TableEquipments;
use vloop\entities\contracts\IField;
use vloop\entities\exceptions\NotFoundEntity;

class Cart implements ICart
{
    private $_record = false;

    public function __construct(private IField $cartToken)
    {
    }

    public function addEquipment(IField $equipmentId): void
    {
        $equipmentRecord = TableEquipments::find()
            ->where(['id' => $equipmentId->asInt()])
            ->one();
        $exceptionTitle = 'Не удалось добавить продукт в корзину';
        if (!$equipmentRecord) {
            throw new NotFoundEntity(
                'Продукт не найден',
                $exceptionTitle
            );
        }
        $cardRecord = TableCarts::find()
            ->where(['token'=>$this->cartToken->asString()])
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