<?php
declare(strict_types=1);

namespace app\shop\product\struct;

use app\models\AbstractStruct;

final class EquipmentStruct extends AbstractStruct
{
    public function __construct(
        public readonly int $count,
        public readonly float $price,
        public readonly string $name
    )
    {
    }
}