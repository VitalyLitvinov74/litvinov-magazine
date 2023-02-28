<?php
declare(strict_types=1);

namespace app\shop\carts\events;

use app\shop\carts\contracts\CartRepositoryInterface;
use app\shop\contracts\AddableEquipmentInterface;
use vloop\entities\contracts\IForm;
use vloop\entities\fields\FieldOfForm;

final class AddEquipmentToCartDefaultBehavior implements AddableEquipmentInterface
{
    public function __construct(private CartRepositoryInterface $repository)
    {
    }

    public function addEquipment(IForm $equipmentCartForm): void
    {
        $cart = $this->repository->cartRecord();
        $equipment = $this->repository->equipmentRecord(
            new FieldOfForm($equipmentCartForm, 'equipmentId')
        );
        $cart->link('equipments', $equipment);
    }
}