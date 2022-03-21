<?php


namespace app\controllers\v1;


use app\models\fields\FieldLastId;
use app\models\forms\FamilyForm;
use app\models\shop\products\families\FamiliesSQLSpeaking;
use app\models\shop\products\families\ProductFamilyFrom;
use app\tables\TableFamilies;
use Exception;
use vloop\entities\exceptions\AbstractException;
use vloop\entities\fields\Field;
use vloop\entities\yii2\queries\InTable;
use Yii;
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
        $family =
            new ProductFamilyFrom(
                new FamilyForm()
            );
        $families = new FamiliesSQLSpeaking();
        return $families
            ->add($family)
            ->productFamily(
                new FieldLastId(
                    new InTable(TableFamilies::class),
                    'продукта'
                )
            )
            ->printYourSelf();
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