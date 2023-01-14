<?php

namespace app\shop\carts\contracts;

use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;

interface ICart
{
    public function addEquipment(IForm $equipmentId): void;

    public function removeEquipment(IField $equipmentId): void;
}