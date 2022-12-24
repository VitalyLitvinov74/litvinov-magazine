<?php


namespace app\models\forms\decorators;


use app\models\forms\EquipmentForm;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\yii2\AbstractForm;
use vloop\Yii2\Validators\ArrayValidator;
use vloop\Yii2\Validators\CustomEachValidator;
use vloop\Yii2\Validators\ValidationModel;
use yii\base\Model;

class MergedForm implements IForm
{
    private $origin;
    private $needleMerge;
    private $attributeName;
    private $dynamicForm;

    public function __construct(AbstractForm $origin, AbstractForm $needleMerge, string $attributeName)
    {
        $this->origin = $origin;
        $this->needleMerge = $needleMerge;
        $this->attributeName = $attributeName;
        $this->dynamicForm = new ValidationModel();
    }

    public function validatedFields(): array
    {
        $dynamicForms =
    }

    private function totalForm(): Model
    {
        $rules = $this->origin->rules();
        $attributes = $this->origin->getAttributes();
        $rules = array_merge(
            $rules,
            [
                ArrayValidator::class,
                'subRules' => $this->needleMerge->rules()
            ]
        );
        $attributes = array_merge(
            $attributes,
            [
                $this->attributeName=>$this->needleMerge->getAttributes()
            ]
        );
        $this->dynamicForm->attributes = $attributes;
        $this->dynamicForm->setRules($rules);
        return $this->dynamicForm;
    }
}