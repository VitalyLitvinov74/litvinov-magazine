<?php


namespace app\controllers\v1;


use app\models\forms\LabelForm;
use app\models\forms\ProductFamilyForm;
use app\models\forms\ProductsForm;
use app\models\shop\products\decorators\ImproveProducts;
use app\models\shop\products\decorators\ProductsByForm;
use app\models\shop\products\decorators\ProductsInDB;
use app\models\shop\products\decorators\WeByForm;
use app\models\shop\products\family\decorators\FamiliesWithLabels;
use app\models\shop\products\family\decorators\FamiliesWithProducts;
use app\models\shop\products\family\decorators\FamilyWithImages;
use app\models\shop\products\family\decorators\WeInDB;
use app\models\shop\products\family\decorators\WithProducts;
use app\models\shop\products\family\EmptyFamily;
use app\models\shop\products\family\ProductFamilies;
use app\models\shop\products\family\ProductFamily;
use app\models\shop\products\family\ProductsFamilies;
use app\models\shop\products\images\decorators\ImagesInDB;
use app\models\shop\products\images\Images;
use app\models\shop\products\images\ImagesFromForm;
use app\models\shop\products\labels\ProductLabels;
use app\models\shop\products\Product;
use app\models\shop\products\Products;
use Exception;
use Symfony\Component\DomCrawler\Form;
use vloop\entities\contracts\IField;
use vloop\entities\exceptions\AbstractException;
use vloop\entities\fields\Field;
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
            new FamilyWithImages(
                new WithProducts(
                    new EmptyFamily(),
                    new ProductsInDB(
                        new ProductsByForm(
                            new ProductsForm()
                        )
                    )
                ),
                new ImagesInDB(
                    new ImagesFromForm(
                        new LabelForm()
                    )
                )
            );
        $families = new WeInDB(
            new ProductsFamilies()
        );
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