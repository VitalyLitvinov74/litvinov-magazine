<?php


namespace app\controllers\v1;

use app\models\forms\ProductCardForm;
use app\models\shop\product\card\ProductCards;
use app\tables\RowProductCard;
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

    public function actionShowAll()
    {

    }

    public function actionById(int $id)
    {
        $cards = new ProductCards();
        return
            $cards
                ->find()
                ->where(
                    'id=:id',
                    [":id" => new Field('id', $id)]
                )->one();
    }
}