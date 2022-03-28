<?php


namespace app\controllers\v1;


use app\models\fields\FieldLastId;
use app\models\forms\EmptyForm;
use app\models\forms\FamilyForm;
use app\models\forms\ImagesForm;
use app\models\queries\ram\CachedRelation;
use app\models\queries\ram\CacheOne;
use app\models\shop\families\decorators\FamilyWithImages;
use app\models\shop\images\decorators\CachedImage;
use app\models\shop\images\decorators\CachedImages;
use app\models\shop\images\Image;
use app\models\shop\images\ImagesByForm;
use app\models\shop\images\ImagesSQL;
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
        $families = new WithProdcuts(
            new FamiliesSQL()
        );
        $json = new JsonStandart(
            $families
                ->addFamily(
                    new FamilyForm()
                )
                ->lastAdded(),
            'Family',
            false
        );
        return $json->printYourSelf();
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

    public function actionTest()
    {
        $families = new \app\models\shop\families2\FamiliesSQL();
        $families->addFamily(
            new FamilyWithImages2(
                new FamylyByPost(
                    new FamilyForm()
                ),
                new ImagesByForm(
                    new ImagesForm(
                        new EmptyForm()
                    )
                )
            )
        );

        $family =
        $images = new CachedImages(
            new ImagesSQL(),
            new CachedRelation(
                $cache,
                'images'
            )
        );
        $images->addImages();
        return $family->printYourSelf();
    }
}