<?php
declare(strict_types=1);

namespace app\shop\carts;

use app\models\forms\EquipmentToCartForm;
use app\shop\carts\contracts\CartRepositoryInterface;
use app\shop\carts\events\AddEquipmentEvent;
use app\shop\carts\events\CheckEquipmentInStockEvent;
use app\shop\carts\events\RemovedEquipmentEvent;
use app\shop\contracts\EquipmentStorageInterface;
use app\shop\exceptions\AddEquipmentException;
use app\shop\exceptions\RemoveEquipmentException;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use yii\db\Exception;
use yii\db\StaleObjectException;

class Cart implements EquipmentStorageInterface
{
    private CartRepositoryInterface $repository;

    public function __construct(
        IField $cartToken,
        IField $customerToken
    ) {
        $this->repository = new CartRepository($cartToken, $customerToken);
    }

    /**
     * @param IForm $equipmentCartForm
     * @return void
     * @throws AddEquipmentException
     * @throws NotValidatedFields
     */
    public function addEquipment(IForm $equipmentCartForm): void
    {
        $addableEvent =
            new CheckEquipmentInStockEvent(
                new AddEquipmentEvent(
                    $this->repository
                )
            );
        $addableEvent->addEquipment($equipmentCartForm);
    }

    /**
     * @param IForm $removeEquipmentForm
     * @return void
     * @throws RemoveEquipmentException
     */
    public function removeEquipment(IForm $removeEquipmentForm): void
    {
        $removableEvent =
            new RemovedEquipmentEvent(
                $this->repository
            );
        $removableEvent->removeEquipment($removeEquipmentForm);
    }
}