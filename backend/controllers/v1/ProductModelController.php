<?php


namespace app\controllers\v1;


use app\entities\shop\models\decorators\WithImages;
use app\entities\shop\models\decorators\WithInfo;
use app\entities\shop\models\ProductModels;
use app\tables\TableProductModels;
use vloop\entities\standarts\json\decorators\WithLinks;
use vloop\entities\standarts\json\JsonStandart;
use vloop\entities\yii2\criteria\InTable;
use yii\helpers\VarDumper;
use yii\rest\Controller;

class ProductModelController extends Controller
{
    public function actionCreate()
    {
        $query = new InTable(TableProductModels::class);
        $productModels =
            new WithInfo(
                new WithImages(
                    new ProductModels($query)
                )
            );
        $json =
            new JsonStandart(
                $productModels->add(),
                'product',
                false
            )
        ;
        return $json->printYourSelf();
    }

    public function actionDeleteProduct()
    {

    }
}