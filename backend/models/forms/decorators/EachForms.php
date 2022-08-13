<?php


namespace app\models\forms\decorators;


use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\Yii2\Validators\ArrayValidator;
use vloop\Yii2\Validators\ValidationModel;
use yii\base\Model;

class EachForms implements IForm
{
    private $origin;
    private $eachAs;
    private $dynamicForm;

    public function __construct(Model $origin, string $string, Model $eachAs)
    {
        $this->origin = $origin;
        $this->eachAs = $eachAs;
        $this->dynamicForm = new ValidationModel();

    }

    public function validatedFields(): array
    {

    }

    private function mergeRules() {
        $rules = $this->origin->rules();
        $attributes = $this->origin->getAttributes();
        foreach ()
    }
}