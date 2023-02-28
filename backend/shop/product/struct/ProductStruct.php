<?php
declare(strict_types=1);

namespace app\shop\product\struct;

use app\models\AbstractStruct;
use vloop\entities\contracts\IForm;

final class ProductStruct extends AbstractStruct
{
    public static function byForm(IForm $form): ProductStruct
    {
        return parent::byForm($form);
    }

    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $shortDescription,
        public readonly array $equipments = [],
        public readonly array $characteristics = [],
        public readonly int $categoryId = 0,
    )
    {
    }
}