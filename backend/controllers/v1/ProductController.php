<?php


namespace app\controllers\v1;

use app\models\fields\Field;
use app\models\forms\ProductCardForm;
use app\shop\product\card\ProductCard;
use app\shop\product\card\ProductCards;
use yii\rest\Controller;

class ProductController extends Controller
{
    public function actionCreate()
    {
        $cards = new ProductCards();
        return $cards
            ->add(new ProductCardForm());
    }

    public function actionShowAll()
    {
        $cads = new ProductCards();
        return $cads
            ->findBy()
            ->orderBy(['id' => SORT_DESC])
            ->all();
    }

    public function actionById(int $id)
    {
        return ProductCard::byId(new Field($id))->asArray();
    }
}