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
                    'subRules' => [
                        $this->rulesFormForm(
                            new ProductForm()
                        ),
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
                        ],
                    ]
                ]
            ]
        ];
    }

    private function rulesFormForm(Model $form): array
    {
        return $form->rules()[0];
    }
}