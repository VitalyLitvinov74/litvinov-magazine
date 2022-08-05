<?php


namespace app\models\forms;


use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\yii2\AbstractForm;
use vloop\Yii2\Validators\ArrayValidator;
use vloop\Yii2\Validators\CustomEachValidator;
use yii\base\DynamicModel;
use yii\base\Model;
use yii\helpers\VarDumper;

class FamilyForm implements IForm
{
    /** @var AbstractForm */
    private $parentForm;

    /** @var DynamicModel */
    private $dynamicForm;

    /**@var IForm[] */
    private $childForms;

    /**
     * FamilyForm constructor.
     * @param AbstractForm $parentForm
     * @param AbstractForm[] $childForms - массив где ключ - имя формы, значение сама форма
     */
    public function __construct(AbstractForm $parentForm, array $childForms = [])
    {
        $this->parentForm = $parentForm;
        $this->dynamicForm = new DynamicModel();
        $this->childForms = $childForms;
    }

    public function validatedFields(): array
    {
        $dynamicForm = $this->dynamicForm;
        $dynamicForm->setAttributes($this->parentForm->validatedFields());
        foreach ($this->parentForm->rules() as $parentRule) {
            $ruleAttributes = $parentRule[0];
            $ruleName = $parentRule[1];
            $dynamicForm->addRule($ruleAttributes, $ruleName);
        }
        VarDumper::dump($this->parentForm->rules());die;
        foreach ($this->childForms as $nameChildForm => $childForm){
            $dynamicForm->addRule(
                $nameChildForm,
                CustomEachValidator::class,
                [
                    'rule'=>[
                        ArrayValidator::class,
                        'subRules'=>[
                            $childForm->rules()
                        ]
                    ]
                ]
            );
        }

    }
}