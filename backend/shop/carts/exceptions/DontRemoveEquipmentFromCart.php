<?php
declare(strict_types=1);

namespace app\shop\carts\exceptions;

use vloop\entities\exceptions\AbstractException;

class DontRemoveEquipmentFromCart extends AbstractException
{
    public function __construct(
        string $description,
        int $code = 422,
        string $message = 'Не удалось удалить продукт из корзины'
    ) {
        parent::__construct([$description], $code, $message);
    }
}