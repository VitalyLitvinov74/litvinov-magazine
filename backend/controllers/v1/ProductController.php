<?php


namespace app\controllers\v1;


use app\models\fields\FieldLastId;
use app\models\forms\EmptyForm;
use app\models\forms\FamilyForm;
use app\models\forms\ImagesForm;
use app\models\cache\ram\CachedRelation;
use app\models\cache\ram\CacheOne;
use app\models\shop\catalog\images\decorators\PrintedWithImages;
use app\models\shop\catalog\products\images\ProductImages;
use app\models\shop\catalog\products\ProductCard;
use app\models\shop\families\decorators\FamilyWithImages;
use app\models\shop\images\decorators\CachedImage;
use app\models\shop\images\decorators\CachedImages;
use app\models\shop\images\Image;
use app\models\shop\images\ImagesByForm;
use app\models\shop\images\ImagesSQL;
use app\models\shop\product\ProductCardCollection;
use app\tables\TableFamilies;
use app\tables\TableFamiliesImages;
use Exception;
use vloop\entities\exceptions\AbstractException;
use vloop\entities\fields\Field;
use vloop\entities\fields\FieldOfForm;
use vloop\entities\standarts\json\JsonStandart;
use vloop\entities\yii2\forms\IdForm;
use vloop\entities\yii2\queries\InTable;
use Yii;
use yii\console\widgets\Table;
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
                new ProductImages($productId)
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