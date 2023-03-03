<?php
declare(strict_types=1);

namespace app\shop\product\equipments\struct;

use app\models\AbstractStruct;

final class EquipmentStruct extends AbstractStruct
{
    public function __construct(
        public readonly int $id,
        public readonly int $count,
        public readonly float $price,
        public readonly string $name = ''
    )
    {
    }
}