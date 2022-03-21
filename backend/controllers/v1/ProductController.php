<?php


namespace app\controllers\v1;


use app\models\forms\LabelForm;
use app\models\forms\ProductFamilyForm;
use app\models\forms\ProductsForm;
use app\models\shop\products\decorators\ImproveProducts;
use app\models\shop\products\family\decorators\FamiliesWithLabels;
use app\models\shop\products\family\decorators\FamiliesWithProducts;
use app\models\shop\products\family\ProductFamilies;
use app\models\shop\products\family\ProductFamily;
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
        $labels = new ProductLabels();
        $products = new Products();
        $productFamilies =
            new FamiliesWithLabels(
                new FamiliesWithProducts(
                    new ProductFamilies(),
                    $products->addProducts(new ProductsForm())
                ),
                $labels->addLabel(new LabelForm())
            );
        $productFamilies->add();
        return $productFamilies->printYourSelf();
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