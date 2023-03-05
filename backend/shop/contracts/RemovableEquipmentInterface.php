<?php
declare(strict_types=1);

namespace app\shop\contracts;

use app\shop\exceptions\RemoveEquipmentException;
use app\shop\product\struct\EquipmentStruct;
use vloop\entities\exceptions\NotValidatedFields;

;

interface RemovableEquipmentInterface
{
    /**
     * @param EquipmentStruct $removeEquipment
     * @throws RemoveEquipmentException
     * @throws NotValidatedFields
     */
    public function removeEquipment(EquipmentStruct $removeEquipment): void;
}