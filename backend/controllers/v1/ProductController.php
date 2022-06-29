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
        return parent::runAction($id, $params);
    }

    public function actionCreate()
    {

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

    public function actionChangeDescription()
    {

    }
}