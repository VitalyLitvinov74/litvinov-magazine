<?php
declare(strict_types=1);

namespace app\shop\carts\states;

use app\models\forms\EquipmentInCartForm;
use app\models\IState;
use app\models\StackFSM;
use app\shop\carts\contracts\ICartRepository;
use app\shop\contracts\IAddableEquipment;
use app\shop\contracts\IEquipmentStorage;
use app\tables\TableCarts;
use app\tables\TableEquipments;
use vloop\entities\contracts\IForm;
use vloop\entities\fields\FieldOfForm;
use yii\db\Exception;
use yii\db\StaleObjectException;

class ReadyCart implements IAddableEquipment, IState
{
    public function __construct(private ICartRepository $repository)
    {
    }

    /**
     * @param EquipmentInCartForm $equipmentCartForm
     */
    public function addEquipment(IForm $equipmentCartForm): void
    {

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

    /**
     * @param ...$data
     * @return mixed|void
     */
    public function execute(...$data)
    {

    }

    /**
     * @return bool
     */
    public function isFinalState(): bool
    {

    }
}