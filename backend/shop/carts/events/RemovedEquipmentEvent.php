<?php
declare(strict_types=1);

namespace app\shop\carts\events;
use app\shop\carts\contracts\CartRepositoryInterface;
use app\shop\contracts\RemovableEquipmentInterface;
use app\shop\exceptions\RemoveEquipmentException;
use app\shop\product\equipments\struct\EquipmentStruct;
use vloop\entities\contracts\IForm;
use vloop\entities\fields\Field;
use vloop\entities\fields\FieldOfForm;
use yii\db\Exception;
use yii\db\StaleObjectException;

final class RemovedEquipmentEvent implements RemovableEquipmentInterface
{
    public function __construct(private readonly CartRepositoryInterface $repository)
    {
    }

    /**
     * @param EquipmentStruct $equipmentStruct
     * @throws RemoveEquipmentException
     */
    public function removeEquipment(EquipmentStruct $equipmentStruct): void
    {
        $equipmentRecord = $this
            ->repository
            ->equipmentRecord(
                new Field($equipmentStruct->id)
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