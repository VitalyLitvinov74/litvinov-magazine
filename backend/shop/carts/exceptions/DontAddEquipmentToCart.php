<?php
declare(strict_types=1);

namespace app\shop\carts\exceptions;

use Throwable;
use vloop\entities\contracts\WeExceptions;
use vloop\entities\exceptions\AbstractException;
use yii\base\Exception;

class DontAddEquipmentToCart extends AbstractException
{
    public function __construct(
        string $description,
        int $code = 422,
        string $message = 'Не удалось добавить продукт в корзину')
    {
        parent::__construct([$description], $code, $message);
    }
}