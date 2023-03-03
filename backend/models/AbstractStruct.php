<?php
declare(strict_types=1);

namespace app\models;

use app\shop\product\struct\ProductStruct;
use vloop\entities\contracts\IForm;

abstract class AbstractStruct
{
    public static function byForm(IForm $form): static
    {
        $r = new \ReflectionMethod(static::class, '__construct');
        $params = array_column($r->getParameters(), 'name');
        $mapped = [];
        foreach ($form->validatedFields() as $fieldKey => $field) {
            if (in_array($fieldKey, $params)) {
                $mapped[$fieldKey] = $field;
            }
        }
        return new static(...$mapped);
    }
}