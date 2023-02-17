<?php
declare(strict_types=1);

namespace app\shop\carts;

use app\models\forms\EquipmentToCartForm;
use app\models\StackFSM;
use app\shop\carts\states\AddedEquipment;
use app\shop\carts\states\CheckedForStock;
use app\shop\carts\states\RemovedEquipment;
use app\shop\contracts\IEquipmentStorage;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use yii\db\Exception;
use yii\db\StaleObjectException;

class Cart implements IEquipmentStorage
{
    private $removableStatemachine;
    private $addableStateMachine;

    public function __construct(
        IField $cartToken,
        IField $customerToken
    ) {
        $this->addableStateMachine = new StackFSM([
            new AddedEquipment(
                $repository = new CartRepository($cartToken, $customerToken)
            ),
            new CheckedForStock()
        ]);
        $this->removableStatemachine = new StackFSM([
           new RemovedEquipment(
               $repository
           )
        ]);
    }

    /**
     * @param EquipmentToCartForm $equipmentCartForm
     */
    public function addEquipment(IForm $equipmentCartForm): void
    {
        $this->addableStateMachine->goToFinalState($equipmentCartForm);
    }

    /**
     * @param EquipmentToCartForm $removeEquipmentForm
     */
    public function removeEquipment(IForm $removeEquipmentForm): void
    {
        $this->removableStatemachine->goToFinalState($removeEquipmentForm);
    }
}