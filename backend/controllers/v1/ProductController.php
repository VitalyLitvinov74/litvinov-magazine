<?php


namespace app\controllers\v1;

use app\models\forms\ProductCardForm;
use app\shop\product\card\ProductCard;
use app\shop\product\card\ProductCards;
use app\tables\TableProductCard;
use vloop\entities\fields\Field;
use yii\rest\Controller;

class ProductController extends Controller
{
    public function actionCreate()
    {
        $cards = new ProductCards();
        return $cards->add(
            new ProductCardForm()
        );
    }

    public function actionById(int $id)
    {
        $cards = new ProductCards();
        return $cards->findOne(TableProductCard::find()->where(['id' => $id]));
    }
}