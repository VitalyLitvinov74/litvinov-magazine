<?php


namespace app\models\forms;

use vloop\entities\yii2\AbstractForm;

class ProductsForm extends AbstractForm
{
    public $products;

    public function rules()
    {
        return [
            [['products'], 'required'],
            ['products', 'validateProducts']
        ];
    }

    /**
     * @param ProductsForm $model
     * @param              $attribute
     * @return bool
     * @throws NotValidatedFields
     */
    public function validateProducts($model, $attribute)
    {
        if(!is_array($model->products)){
            $this->addError("products", 'products должен быть массивом продуктов');
            return false;
        }
        foreach ($model->products as $product){
            $productForm = new ProductForm();
            $productForm->load($product, '');
            $productForm->validatedFields();
        }
        return true;
    }
}