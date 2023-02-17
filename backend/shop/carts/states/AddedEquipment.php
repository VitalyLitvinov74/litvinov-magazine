<?php
declare(strict_types=1);

namespace app\shop\carts\states;

use app\models\IState;
use app\shop\carts\contracts\ICartRepository;
use app\shop\contracts\IAddableEquipment;
use vloop\entities\contracts\IForm;
use vloop\entities\fields\FieldOfForm;

final class AddedEquipment implements IAddableEquipment, IState
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

    /**
     * @param ...$data
     * @return mixed|void
     */
    public function execute(...$data)
    {
        $this->addEquipment(...$data);
    }

    /**
     * @return bool
     */
    public function isFinalState(): bool
    {
        return true;
    }
}