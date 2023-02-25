<?php
declare(strict_types=1);

namespace app\shop\carts\events;

use app\models\IState;
use app\models\petrinet\PetriEventInterface;
use app\shop\carts\contracts\ICartRepository;
use app\shop\contracts\IRemovableEquipment;
use vloop\entities\contracts\IForm;
use vloop\entities\fields\FieldOfForm;
use yii\db\Exception;
use yii\db\StaleObjectException;

final class RemovedEquipment implements IRemovableEquipment, PetriEventInterface
{
    public function __construct(private ICartRepository $repository)
    {
    }

    /**
     * @param IForm $removeEquipmentForm
     * @throws Exception
     * @throws StaleObjectException
     */
    public function removeEquipment(IForm $removeEquipmentForm): void
    {
        $equipmentRecord = $this
            ->repository
            ->equipmentRecord(
                new FieldOfForm(
                    $removeEquipmentForm,
                    'equipmentId'
                )
            );
        $cartRecord = $this
            ->repository
            ->cartRecord();
        $cartRecord
            ->unlink(
                'equipments',
                $equipmentRecord
            );
    }
}