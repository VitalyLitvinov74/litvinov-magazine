<?php
declare(strict_types=1);

namespace app\shop\product\equipments\struct;

use app\models\AbstractStruct;
use vloop\entities\contracts\IForm;

final class EquipmentStruct extends AbstractStruct
{
    public static function byForm(IForm $form): static
    {
        return parent::byForm($form);
    }

    public function __construct(
        public readonly int $id,
        public readonly int $count,
        public readonly float $price,
        public readonly string $name = ''
    )
    {
    }
}