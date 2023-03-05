<?php
declare(strict_types=1);

namespace app\shop\contracts;

use app\shop\exceptions\AddEquipmentException;
use app\shop\product\struct\EquipmentStruct;
use vloop\entities\exceptions\NotValidatedFields;

interface AddableEquipmentInterface
{
    /**
     * @param EquipmentStruct $equipmentStruct
     * @return void
     * @throws AddEquipmentException
     * @throws NotValidatedFields
     */
    public function addEquipment(EquipmentStruct $equipmentStruct): void;
}