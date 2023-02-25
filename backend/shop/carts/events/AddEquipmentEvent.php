<?php
declare(strict_types=1);

namespace app\shop\carts\events;

use app\models\IState;
use app\models\petrinet\PetriEventInterface;
use app\shop\carts\contracts\ICartRepository;
use app\shop\contracts\IAddableEquipment;
use vloop\entities\contracts\IForm;
use vloop\entities\fields\FieldOfForm;

final class AddEquipmentEvent implements IAddableEquipment, PetriEventInterface
{
    public function __construct(private ICartRepository $repository)
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