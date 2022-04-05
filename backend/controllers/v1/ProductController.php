<?php


namespace app\controllers\v1;


use app\models\shop\catalog\images\decorators\PrintedWithImages;
use app\models\shop\catalog\products\images\ProductGallery;
use app\models\shop\catalog\products\ProductCard;
use Exception;
use vloop\entities\exceptions\AbstractException;
use vloop\entities\fields\Field;
use yii\rest\Controller;

class ProductController extends Controller
{
    public function runAction($id, $params = [])
    {
        try {
            return parent::runAction($id, $params);
        } catch (AbstractException $e) {

        } catch (Exception $e) {
//            $json = new Error($e->getMessage(), $e->getCode());

        }
    }

    public function actionCreate()
    {

    }

    public function addImage()
    {
    }

    public function actionShowAll()
    {

    }

    public function actionById(int $id)
    {
        $productCard =
            new PrintedWithImages(
                new ProductCard(
                    $productId = new Field('id', $id)
                ),
                new ProductGallery($productId)
            );
        $productCard->printYourSelf();
    }

    public function actionList()
    {

    }

    public function actionDelete()
    {

    }

    public function actionChangeDescription()
    {

    }

    public function actionChangeImages()
    {

    }

    public function actionTest()
    {

    }
}