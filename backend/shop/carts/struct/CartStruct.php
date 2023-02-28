<?php
declare(strict_types=1);

namespace app\shop\carts\struct;

use app\models\AbstractStruct;
use vloop\entities\contracts\IForm;

final class CartStruct extends AbstractStruct
{
    public static function byForm(IForm $form): CartStruct
    {
        return parent::byForm($form);
    }

    public function __construct(
        public readonly string $token
    )
    {
    }
}