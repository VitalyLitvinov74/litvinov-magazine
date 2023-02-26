<?php
declare(strict_types=1);

namespace app\shop\contracts;

use app\shop\exceptions\RemoveEquipmentException;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;

;

interface RemovableEquipmentInterface
{
    /**
     * @param IForm $removeEquipmentForm
     * @throws RemoveEquipmentException|NotValidatedFields
     */
    public function removeEquipment(IForm $removeEquipmentForm): void;
}