<?php


namespace app\models\forms;


use vloop\entities\yii2\AbstractForm;
use vloop\Yii2\Validators\ArrayValidator;
use vloop\Yii2\Validators\CustomEachValidator;
use vloop\Yii2\Validators\ValidationModelTrait;
use yii\base\Model;
use yii\helpers\VarDumper;

class ProductForm extends AbstractForm
{
    public $description;
    public $shortDescription;
    public $title;
    public $equipments;
    public $characteristics;

    public function rules()
    {
        return [
            [['description', 'shortDescription', 'title'], 'required'],
            [['description', 'shortDescription', 'title'], 'string'],
            [
                'equipments',
                CustomEachValidator::class,
                "rule" => [
                    ArrayValidator::class,
                    'subRules' => $this->mergeWithFormRules(
                        new EquipmentForm(),
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
            ],
            ['characteristics', 'default', 'value' => []],
            [
                'characteristics',
                CustomEachValidator::class,
                'rule' => [
                    ArrayValidator::class,
                    'subRules' => $this->mergeWithFormRules(
                        new CharacteristicForm()
                    )
                ],
            ]
        ];
    }

    private function mergeWithFormRules(Model $model, array ...$rulesList): array
    {
        $totalRules = [];
        $totalRules = array_merge($totalRules, $model->rules());
        foreach ($rulesList as $rule) {
            $totalRules = array_merge($totalRules, [$rule]);
        }
        return $totalRules;
    }
}