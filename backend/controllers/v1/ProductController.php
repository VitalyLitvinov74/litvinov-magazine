<?php


namespace app\controllers\v1;

use app\models\forms\CreateProductForm;
use app\shop\product\struct\ProductStruct;
use app\shop\stock\Warehouse;
use app\tables\TableProducts;
use vloop\entities\fields\Field;
use yii\rest\Controller;

class ProductController extends Controller
{
    public function actionCreate()
    {
        $form = new CreateProductForm();
        $form->load($this->request->post(), '') && $form->validate();
        $products = new Warehouse();
        return $products->addBy($form)->toArray([], ['equipments', 'equipments.characteristics', 'characteristics']);
    }

    public function actionById(int $id)
    {
        $cards = new Warehouse();
        return $cards->findOne(TableProducts::find()->where(['id' => $id]));
    }

    public function actionDelete(int $id)
    {
        $products = new Warehouse();
        $products->remove(
            new Field($id)
        );
    }
}