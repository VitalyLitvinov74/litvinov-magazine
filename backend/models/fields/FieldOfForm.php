<?php


namespace app\models\fields;


use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;

class FieldOfForm implements IField
{
    private $form;
    private $needleField;
    private $value = null;

    public function __construct(IForm $form, string $fieldName)
    {
        $this->form = $form;
        $this->needleField = $fieldName;
    }


    public function asInt(): int
    {
        return $this->field()->asInt();
    }

    public function asFloat(): float
    {
        return $this->field()->asFloat();
    }

    public function asBool(): bool
    {
        return $this->field()->asBool();
    }

    public function asString(): string
    {
        return $this->field()->asString();
    }

    private function field(): IField{
        if(!is_null($this->value)){
            return $this->value;
        }
        $validatedFields = $this->form->validatedFields();
        if(isset($validatedFields[$this->needleField])){
            $this->value = new Field(
                $validatedFields[$this->needleField]
            );
            return $this->value;
        }
        throw new \Exception('Field not exist', 400);
    }
}