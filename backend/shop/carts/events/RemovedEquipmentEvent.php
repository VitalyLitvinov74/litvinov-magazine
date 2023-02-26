<?php
declare(strict_types=1);

namespace app\shop\carts\events;
use app\shop\carts\contracts\CartRepositoryInterface;
use app\shop\contracts\RemovableEquipmentInterface;
use app\shop\exceptions\RemoveEquipmentException;
use vloop\entities\contracts\IForm;
use vloop\entities\fields\FieldOfForm;
use yii\db\Exception;
use yii\db\StaleObjectException;

final class RemovedEquipmentEvent implements RemovableEquipmentInterface
{
    public function __construct(private CartRepositoryInterface $repository)
    {
    }

    /**
     * @param IForm $removeEquipmentForm
     * @throws RemoveEquipmentException
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
        try {
            $cartRecord
                ->unlink(
                    'equipments',
                    $equipmentRecord
                );
        }catch (\Exception $exception){
            throw new RemoveEquipmentException(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }
}