<?php


namespace app\controllers\v1;


use app\models\forms\LabelForm;
use app\models\forms\ProductFamilyForm;
use app\models\forms\ProductsForm;
use app\models\shop\products\decorators\ImproveProducts;
use app\models\shop\products\family\ProductFamilies;
use app\models\shop\products\family\ProductFamily;
use app\models\shop\products\labels\ProductLabels;
use app\models\shop\products\Product;
use app\models\shop\products\Products;
use Symfony\Component\DomCrawler\Form;
use vloop\entities\contracts\IField;
use vloop\entities\fields\Field;
use Yii;
use yii\rest\Controller;

class ProductController extends Controller
{
    public function actionCreate()
    {
        $productFamilies = new ProductFamilies();
        $labels = new ProductLabels();
        $products = new Products();
        $productFamilies->add(
            $labels->add(new LabelForm()),
            $products->addProducts(new ProductsForm())
        );
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