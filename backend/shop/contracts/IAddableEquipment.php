<?php
declare(strict_types=1);

namespace app\shop\contracts;

use vloop\entities\contracts\IForm;

interface IAddableEquipment
{
    public function addEquipment(IForm $equipmentCartForm): void;
}