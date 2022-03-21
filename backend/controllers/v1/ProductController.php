<?php


namespace app\controllers\v1;


use app\models\forms\FamilyForm;
use app\models\shop\products\families\FamiliesSQLSpeaking;
use app\models\shop\products\families\ProductFamilyFrom;
use Exception;
use vloop\entities\exceptions\AbstractException;
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
        $families->add($family);
        return $family->printYourSelf(); //здесь должны быть данные со всем id шками
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