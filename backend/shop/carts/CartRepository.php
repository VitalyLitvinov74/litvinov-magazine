<?php
declare(strict_types=1);

namespace app\shop\carts;

use app\shop\carts\contracts\ICartRepository;
use app\tables\TableCarts;
use app\tables\TableEquipments;
use vloop\entities\contracts\IField;
use vloop\entities\exceptions\NotFoundEntity;

class CartRepository implements ICartRepository
{
    private $_cart;

    public function __construct(private IField $cartToken, private IField $customerToken)
    {
    }

    public function cartRecord(): TableCarts
    {
        if (!is_null($this->_cart)) {
            return $this->_cart;
        }
        $struct = TableCarts::find()
            ->joinWith('customer customer')
            ->where(['carts.token' => $this->cartToken->asString()])
            ->andWhere(['customer.token' => $this->customerToken->asString()])
            ->one();
        if ($struct) {
            $this->_cart = $struct;
            return $struct;
        }
        throw new NotFoundEntity('Не удалось найти корзину');
    }

    public function equipmentRecord(IField $equipmentId): TableEquipments
    {
        $equipmentRecord = TableEquipments::find()
            ->where(['id' => $equipmentId->asInt()])
            ->one();
        if ($equipmentRecord) {
            return $equipmentRecord;
        }
        throw new NotFoundEntity('Не удалось найти комплектацию продукта');
    }
}