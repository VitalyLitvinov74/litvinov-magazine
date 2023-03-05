<?php
declare(strict_types=1);

namespace app\shop\product\struct;

final class CharacteristicStruct
{
    public function __construct(
        public readonly string|int|float $value,
        public readonly string $name
    )
    {
    }
}