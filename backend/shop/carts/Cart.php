<?php

namespace app\shop\carts;

use app\shop\carts\contracts\ICart;
use app\tables\TableCarts;
use app\tables\TableCustomers;
use vloop\entities\contracts\IField;

class Cart implements ICart
{
    private $record = false;

    public function __construct(private IField $customerToken)
    {
    }

    public function addEquipment(IField $equipmentId): void
    {

    }

    public function removeEquipment(IField $equipmentId): void
    {
        // TODO: Implement removeEquipment() method.
    }

    private function cartRecord(): TableCarts
    {
        $record = TableCustomers::find()
            ->where(['token' => $this->customerToken->asString()])
            ->one();
        if($record->cart){
            $this->record = $record->cart;
        }

    }
}