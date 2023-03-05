<?php
declare(strict_types=1);

namespace app\shop\carts\events;

use app\shop\carts\contracts\CartRepositoryInterface;
use app\shop\contracts\AddableEquipmentInterface;
use app\shop\product\struct\EquipmentStruct;
use vloop\entities\fields\Field;

final class AddEquipmentToCartDefaultBehavior implements AddableEquipmentInterface
{
    public function __construct(private CartRepositoryInterface $repository)
    {
    }

    public function addEquipment(EquipmentStruct $equipmentStruct): void
    {
        $cart = $this->repository->cartRecord();
        $equipment = $this->repository->equipmentRecord(
            new Field($equipmentStruct->id)
        );
        $cart->link('equipments', $equipment);
    }
}