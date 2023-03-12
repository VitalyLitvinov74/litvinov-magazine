<?php


namespace app\controllers\v1;

use app\models\forms\CreateProductForm;
use app\shop\product\Products;
use app\shop\product\struct\ProductStruct;
use app\tables\TableProducts;
use vloop\entities\fields\Field;
use yii\rest\Controller;

class ProductController extends Controller
{
    public function actionCreate()
    {
        $form = new CreateProductForm();
        $form->load($this->request->post(), '') && $form->validate();
        $products = new Products();
        return $products->addBy($form)->toArray([], ['equipments', 'equipments.characteristics', 'characteristics']);
    }

    public function actionById(int $id)
    {
        $cards = new Products();
        return $cards->findOne(TableProducts::find()->where(['id' => $id]));
    }

    public function actionDelete(int $id)
    {
        $products = new Products();
        $products->remove(
            new Field($id)
        );
    }
}