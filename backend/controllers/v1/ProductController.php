<?php


namespace app\controllers\v1;

use app\models\forms\ProductForm;
use app\shop\product\Products;
use app\tables\TableProducts;
use yii\rest\Controller;

class ProductController extends Controller
{
    public function actionCreate()
    {
        $cards = new Products();
        return $cards->add(
            new ProductForm()
        );
    }

    public function actionById(int $id)
    {
        $cards = new Products();
        return $cards->findOne(TableProducts::find()->where(['id' => $id]));
    }
}