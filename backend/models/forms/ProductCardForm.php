<?php


namespace app\models\forms;


use vloop\entities\yii2\AbstractForm;
use vloop\Yii2\Validators\ArrayValidator;
use vloop\Yii2\Validators\CustomEachValidator;
use vloop\Yii2\Validators\ValidationModelTrait;
use yii\base\Model;
use yii\helpers\VarDumper;

class ProductCardForm extends AbstractForm
{
    public $description;
    public $shortDescription;
    public $title;
    public $products;

    public function rules()
    {
        return [
            [['description', 'shortDescription', 'title'], 'required'],
            [['description', 'shortDescription', 'title'], 'string'],
            [
                'products',
                CustomEachValidator::class,
                "rule" => [
                    ArrayValidator::class,
                    'subRules' => $this->mergeWithFormRules(
                        new ProductForm(),
                        ['characteristics', 'default', 'value' => []],
                        [
                            'characteristics',
                            CustomEachValidator::class,
                            'rule' => [
                                ArrayValidator::class,
                                "subRules" => [
                                    [['name', 'value'], 'required']
                                ],
                            ],
                        ]
                    )
                ]
            ]
        ];
    }

    private function mergeWithFormRules(Model $model, array ...$rulesList): array {
        $totalRules = [];
        $totalRules = array_merge($totalRules, $model->rules());
        foreach ($rulesList as $rule){
            $totalRules = array_merge($totalRules, [$rule]);
        }
        return $totalRules;
    }
}