<?php


namespace app\controllers\v1;


use app\models\chains\ChainInTransaction;
use app\models\chains\ChainOfResponsibility;
use app\models\chains\DynamicElement;
use app\models\forms\ProductCardForm;
use app\models\shop\catalog\images\decorators\PrintedWithImages;
use app\models\shop\catalog\products\images\ProductGallery;
use app\models\shop\catalog\products\ProductCard;
use app\models\shop\catalog\products\ProductCardFactory;
use Exception;
use vloop\entities\exceptions\AbstractException;
use vloop\entities\fields\Field;
use yii\helpers\VarDumper;
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