<?php
declare(strict_types=1);

namespace app\models;

use app\shop\product\struct\ProductStruct;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;

abstract class AbstractStruct
{
    /**
     * @throws NotValidatedFields
     */
    public static function byForm(IForm $form, array $mappedAttributes = []): static
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

    private static function reflectedParams()
    {

    }
}