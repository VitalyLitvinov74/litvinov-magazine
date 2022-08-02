<?php


namespace app\models\forms;


use vloop\entities\yii2\AbstractForm;
use vloop\Yii2\Validators\ArrayValidator;
use vloop\Yii2\Validators\CustomEachValidator;
use vloop\Yii2\Validators\ValidationModelTrait;

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
                    'subRules'=>[
                        [['price', 'count'], 'required'],
                        ['price','number', 'min'=>0],
                        ['count', 'integer', 'min'=>0],
                        [
                            'characteristics',
                            CustomEachValidator::class,
                            'rule'=>[
                                ArrayValidator::class,
                                "subRules"=>[
                                    [['name', 'value'], 'required']
                                ]
                            ]
                        ],
                        ['characteristics', 'safe']
                    ]
                ]
            ]
        ];
    }
}