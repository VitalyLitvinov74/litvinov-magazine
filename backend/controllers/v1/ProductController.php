<?php


namespace app\controllers\v1;


use app\models\chains\ChainInTransaction;
use app\models\chains\ChainOfResponsibility;
use app\models\chains\DynamicElement;
use app\models\forms\EmptyForm;
use app\models\forms\ImagesForm;
use app\models\forms\ProductCardForm;
use app\models\shop\images\decorators\PrintedWithImages;
use app\models\shop\products\decorators\WithGallery;
use app\models\shop\images\ProductGallery;
use app\models\shop\products\ProductCard;
use app\models\shop\products\ProductCardByPost;
use app\models\shop\products\ProductCardFactory;
use app\models\shop\images\Gallery;
use app\models\shop\images\PostGallery;
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
        $productCard =
            new WithGallery(
                new ProductCardByPost(
                    new ProductCardForm()
                ),
                new PostGallery(
                    new ImagesForm()
                )
            );

        return $productCard
            ->copyToSystem()
            ->printYourSelf();
    }

    public function actionById(int $id)
    {
        $card =
            new ProductCard(
                $cardId = new Field('id', $id)
            );
        return $card->printYourSelf();
    }

    public function addImage()
    {
        $gallery = new ProductGallery(
            new Field('id', 22)
        );
        $galleryPost = new PostGallery(
            new ImagesForm(
                new EmptyForm()
            )
        );
        $gallery
            ->mergeGalleries($galleryPost->list())//иожет сделать мерж галерей?
            ->printYourSelf();
    }

    public function actionShowAll()
    {

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