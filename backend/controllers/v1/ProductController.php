<?php


namespace app\controllers\v1;


use app\models\fields\FieldLastId;
use app\models\forms\EmptyForm;
use app\models\forms\FamilyForm;
use app\models\forms\ImagesForm;
use app\models\shop\families\decorators\CachedFamily;
use app\models\shop\families\decorators\FamiliesWithImages;
use app\models\shop\families\decorators\test\CachedFamilies;
use app\models\shop\families\decorators\test\InOneRequest;
use app\models\shop\families\decorators\WithImages;
use app\models\shop\families\decorators\WithOneRequestForFamilies;
use app\models\shop\families\decorators\WithOneRequestForFamily;
use app\models\shop\families\FamiliesSQL;
use app\models\shop\families\FamilyByForm;
use app\models\shop\families\FamilySQL;
use app\models\shop\images\decorators\CachedImage;
use app\models\shop\images\decorators\CachedImages;
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
        $query = new InTable(TableFamilies::class); // допусти тут много джоинов и пр. радостей.
        $family = new WithImages(
            new FamilySQL(
                new FieldOfForm(
                    new IdForm(),
                    'id'
                )
            )
        );
        $family
            ->addImages(
                new ImagesForm(
                    new EmptyForm()
                )
            )
            ->printYourSelf();

        $request = new WithOneRequestForFamily(
            function ($record) use ($family) {
                return
                    new CachedImages(
                        $family,
                        $record->images
                    );
            }
        );

    }

    public function actionShowAll()
    {
        $families = new WithOneRequestForFamilies(
            new InTable(TableFamilies::class),
            function ($record) { //указываю как создавать один объект.
                return
                    new CachedImages(
                        new WithImages(
                            new CachedFamily(
                                new FamilySQL($record->id),
                                $record
                            )
                        ),
                        $record->images
                    );
            }
        );
        $families->printYourSelf();
    }

    public function test2()
    {
        new InOneRequest(
            new CachedFamilies(
                new FamiliesWithImages(
                    new FamiliesSQL()
                )
            )
        );
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