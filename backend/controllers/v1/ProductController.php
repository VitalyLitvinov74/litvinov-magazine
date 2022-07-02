<?php


namespace app\controllers\v1;


use app\models\chains\ChainInTransaction;
use app\models\chains\ChainOfResponsibility;
use app\models\chains\DynamicElement;
use app\models\forms\EmptyForm;
use app\models\forms\ImagesForm;
use app\models\forms\ProductCardForm;
use app\models\media\JsonMedia;
use app\models\shop\images\decorators\PrintedWithImages;
use app\models\shop\products\decorators\WithGallery;
use app\models\shop\images\ProductGallery;
use app\models\shop\products\ProductCard;
use app\models\shop\products\ProductCardByPost;
use app\models\shop\products\ProductCardFactory;
use app\models\shop\images\Gallery;
use app\models\shop\images\PostGallery;
use app\tables\TableProductCards;
use Exception;
use vloop\entities\exceptions\AbstractException;
use vloop\entities\fields\Field;
use vloop\entities\fields\FieldOfForm;
use Yii;
use yii\helpers\VarDumper;
use yii\rest\Controller;

class ProductController extends Controller
{
    public function runAction($id, $params = [])
    {
        return parent::runAction($id, $params);
    }

    public function actionCreate()
    {
        $form = new ProductCardForm();
        $productCard = new ProductCard(
            new FieldOfForm($form, 'title'),
            new FieldOfForm($form, 'shortDescription'),
            new FieldOfForm($form, 'description')
        );
        return $productCard
            ->printTo(new TableProductCards())
            ->commit()
            ->printTo(new JsonMedia())
            ->commit();
    }

    public function actionById(int $id)
    {

    }

    public function addImage()
    {

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

    public function actionChangeDescriptions()
    {

    }
}