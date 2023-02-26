<?php
declare(strict_types=1);

namespace app\shop\contracts;

use app\shop\exceptions\AddEquipmentException;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;

interface AddableEquipmentInterface
{
    /**
     * @param IForm $equipmentCartForm
     * @return void
     * @throws AddEquipmentException|NotValidatedFields
     */
    public function addEquipment(IForm $equipmentCartForm): void;
}