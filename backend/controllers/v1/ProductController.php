<?php


namespace app\controllers\v1;


use app\models\fields\FieldLastId;
use app\models\forms\EmptyForm;
use app\models\forms\FamilyForm;
use app\models\forms\ImagesForm;
use app\models\queries\ram\CachedRelation;
use app\models\queries\ram\CacheOne;
use app\models\shop\families\decorators\CachedFamily;
use app\models\shop\families\decorators\FamiliesWithImages;
use app\models\shop\families\decorators\test\CachedFamilies;
use app\models\shop\families\decorators\test\InOneRequest;
use app\models\shop\families\decorators\FamilyWithImages;
use app\models\shop\families\decorators\WithOneRequestForFamilies;
use app\models\shop\families\decorators\WithOneRequestForFamily;
use app\models\shop\families\FamiliesSQL;
use app\models\shop\families\FamilyByForm;
use app\models\shop\families\FamilySQL;
use app\models\shop\images\decorators\CachedImage;
use app\models\shop\images\decorators\CachedImages;
use app\models\shop\images\decorators\WithCachedImages;
use app\models\shop\images\Image;
use app\models\shop\images\ImagesByForm;
use app\tables\TableFamilies;
use app\tables\TableFamiliesImages;
use Exception;
use vloop\entities\exceptions\AbstractException;
use vloop\entities\fields\Field;
use vloop\entities\fields\FieldOfForm;
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
        $families =
            new FamiliesWithImages(
                new FamiliesSQL()
            );
        return $families
            ->addFamily(
                new ImagesForm(
                    new FamilyForm()
                )
            )
            ->lastAdded()
            ->printYourSelf();
    }

    public function addImage()
    {
        $condition = new InTable(TableFamilies::class);
        $family =
            new CachedImages(
                new FamilyWithImages(
                    new CachedFamily(
                        new FamilySQL(
                            new FieldOfForm(
                                new IdForm(),
                                'id'
                            )
                        ),
                        $cache = new CacheOne(
                            $condition
                        )
                    )
                ),
                new CachedRelation(
                    $cache,
                    'images'
                )
            );
        $family
            ->addImages(
                new ImagesForm(
                    new EmptyForm()
                )
            )
            ->printYourSelf();
    }

    public function actionShowAll()
    {

    }

    public function actionById(int $id)
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
}