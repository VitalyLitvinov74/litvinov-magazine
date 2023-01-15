<?php

namespace app\shop\carts\contracts;

use app\tables\TableCarts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;

interface ICart
{
    public function addEquipment(IForm $addToCartForm): void;

    public function removeEquipment(IForm $removeEquipment): void;

    public function struct(): TableCarts;
}