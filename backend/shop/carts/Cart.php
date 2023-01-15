<?php

namespace app\shop\carts;

use app\shop\carts\contracts\ICart;
use app\shop\carts\exceptions\DontAddEquipmentToCart;
use app\shop\product\equipments\EquipmentList;
use app\tables\TableCarts;
use app\tables\TableCustomers;
use app\tables\TableEquipments;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;

class Cart implements ICart
{
    private $_struct = false;

    public function __construct(private IField $customerToken, private IField $cartToken)
    {
    }

    public function addEquipment(IForm $addToCartForm): void
    {
        $validatedFields = $addToCartForm->validatedFields();
        $equipmentRecord = TableEquipments::find()->where([
            'id'=>$validatedFields['equipmentId']
        ])->one();
        if (!$equipmentRecord) {
            throw new DontAddEquipmentToCart('Продукт не найден');
        }

        $this
            ->struct()
            ->link(
                'equipments',
                $equipmentRecord
            );
    }

    public function removeEquipment(IForm $equipmentId): void
    {

    }

    public function struct(): TableCarts
    {
        return TableCarts::find()
            ->joinWith('customer customer')
            ->where(['carts.token'=>$this->cartToken->asString()])
            ->andWhere(['customer.token'=>$this->customerToken->asString()])
            ->one();
    }
}