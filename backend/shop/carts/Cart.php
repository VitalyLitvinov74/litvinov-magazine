<?php
declare(strict_types=1);

namespace app\shop\carts;

use app\models\forms\EquipmentToCartForm;
use app\models\petrinet\PetriNet;
use app\shop\carts\conditions\EquipmentExistedInStockCondition;
use app\shop\carts\enumerations\CartConditions;
use app\shop\carts\enumerations\CartEvents;
use app\shop\carts\events\AddEquipmentEvent;
use app\shop\carts\events\RemovedEquipment;
use app\shop\contracts\IEquipmentStorage;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;

class Cart implements IEquipmentStorage
{
    private CartRepository $repositotory;

    public function __construct(
        IField $cartToken,
        IField $customerToken
    ) {
        $this->repositotory = new CartRepository($cartToken, $customerToken);
    }

    /**
     * @param EquipmentToCartForm $equipmentCartForm
     */
    public function addEquipment(IForm $equipmentCartForm): void
    {
        $fsm = new PetriNet();
        $fsm
            ->addConditionForTransition(
                CartConditions::CheckEquipmentInStore,
                new EquipmentExistedInStockCondition($equipmentCartForm)
            )
            ->addEvent(
                CartEvents::AddEquipmentToCart,
                new AddEquipmentEvent($this->repositotory)
            )
            ->addTransition(
                CartConditions::CheckEquipmentInStore,
                CartEvents::AddEquipmentToCart
            )
            ->goToFinalState();
    }

    /**
     * @param EquipmentToCartForm $removeEquipmentForm
     */
    public function removeEquipment(IForm $removeEquipmentForm): void
    {
        $fsm = new PetriNet();
        $fsm
            ->addEvent(
                CartEvents::RemoveEquipment,
                new RemovedEquipment($this->repositotory)
            )->goToFinalState();
    }
}