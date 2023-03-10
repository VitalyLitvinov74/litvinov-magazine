<?php


namespace app\controllers\v1;

use app\models\forms\CreateProductForm;
use app\shop\product\Products;
use app\tables\TableProducts;
use vloop\entities\fields\Field;
use yii\rest\Controller;
use yii\rest\Serializer;

class ProductController extends Controller
{
    public function actionCreate()
    {
        $cards = new Products();
        return $cards
            ->add(new CreateProductForm())
            ->toArray([], ['equipments', 'equipments.characteristics', 'characteristics'])
            ;
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