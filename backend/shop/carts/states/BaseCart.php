<?php
declare(strict_types=1);

namespace app\shop\carts\states;

use app\models\forms\EquipmentInCartForm;
use app\shop\carts\contracts\ICartRepository;
use app\shop\contracts\IEquipmentStorage;
use app\tables\TableCarts;
use app\tables\TableEquipments;
use vloop\entities\contracts\IForm;
use vloop\entities\fields\FieldOfForm;
use yii\db\Exception;
use yii\db\StaleObjectException;

class BaseCart implements IEquipmentStorage
{
    public function __construct(private ICartRepository $repository)
    {
    }

    /**
     * @param EquipmentInCartForm $equipmentCartForm
     */
    public function addEquipment(IForm $equipmentCartForm): void
    {
        $this->cart()
            ->link(
                'equipments',
                $this->equipment($equipmentCartForm)
            );
    }

    /**
     * @param EquipmentInCartForm $removeEquipmentForm
     * @throws Exception
     * @throws StaleObjectException
     */
    public function removeEquipment(IForm $removeEquipmentForm): void
    {
        $this
            ->cart()
            ->unlink(
                'equipments',
                $this->equipment($removeEquipmentForm)
            );
    }

    private function cart(): TableCarts
    {
        return $this->repository->cartRecord();
    }

    private function equipment(IForm $equipmentActionForm): TableEquipments
    {
        return $this->repository->equipmentRecord(
            new FieldOfForm(
                $equipmentActionForm,
                'equipmentId'
            )
        );
    }
}