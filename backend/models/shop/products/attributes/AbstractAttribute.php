<?php

namespace app\models\shop\products\attributes;


use app\tables\TableProductCharacteristicValues;
use vloop\entities\contracts\IField;
use vloop\entities\fields\Field;

abstract class AbstractAttribute implements IField
{
    /**@var TableProductCharacteristicValues */
    private $_record = false;

    /**
     * @var IField
     */
    protected $fieldId;

    protected function record(): TableProductCharacteristicValues
    {
        if ($this->_record !== false) {
            return $this->_record;
        }
        return $this->_record =
            TableProductCharacteristicValues::find()
                ->where(['id' => $this->fieldId->value()])
                ->one();
    }
}