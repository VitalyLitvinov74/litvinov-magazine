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

        $productList->add($form, function($argumentsFromForm){
            return new Product();
            //or
            return new ValidatedProduct(
                new Product()
            );
        });

    }

    public function actionById(int $id)
    {
        $cards = new Products();
        return $cards->findOne(TableProducts::find()->where(['id' => $id]));
    }
}