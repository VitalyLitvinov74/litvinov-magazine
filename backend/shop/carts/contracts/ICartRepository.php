<?php
declare(strict_types=1);

namespace app\shop\carts\contracts;

use app\tables\TableCarts;
use app\tables\TableEquipments;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;

interface ICartRepository
{
    public function cartRecord(): TableCarts;

    public function equipmentRecord(IField $equipmentId): TableEquipments;
}