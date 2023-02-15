<?php
declare(strict_types=1);

namespace app\shop\carts;

use app\models\forms\EquipmentInCartForm;
use app\shop\carts\contracts\ICart;
use app\shop\carts\contracts\ICartRepository;
use app\shop\carts\states\BaseCart;
use app\shop\carts\states\CheckedForStock;
use app\shop\contracts\IAddableEquipment;
use app\shop\contracts\IEquipmentStorage;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use yii\db\Exception;
use yii\db\StaleObjectException;

class Cart implements IEquipmentStorage
{
    private ICartRepository $repository;

    public function __construct(
        private IField $cartToken,
        private IField $customerToken
    )
    {
        $this->repository = new CartRepository(
            $cartToken,
            $customerToken
        );
    }

    /**
     * @param EquipmentInCartForm $equipmentCartForm
     * @throws NotValidatedFields
     */
    public function addEquipment(IForm $equipmentCartForm): void
    {
        $addableState = new CheckedForStock(
            new BaseCart(
                $this->repository
            ),
        );
        $addableState->addEquipment($equipmentCartForm);
    }

    /**
     * @param EquipmentInCartForm $removeEquipmentForm
     * @throws Exception
     * @throws StaleObjectException
     */
    public function removeEquipment(IForm $removeEquipmentForm): void
    {
        $removableState = new BaseCart(
            $this->repository
        );
        $removableState->removeEquipment($removeEquipmentForm);
    }
}