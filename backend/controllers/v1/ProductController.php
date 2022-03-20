<?php


namespace app\controllers\v1;


use app\models\forms\ProductFamilyForm;
use app\models\forms\ProductsForm;
use app\models\shop\products\decorators\ImproveProducts;
use app\models\shop\products\family\ProductFamilies;
use app\models\shop\products\family\ProductFamily;
use app\models\shop\products\Product;
use app\models\shop\products\Products;
use Symfony\Component\DomCrawler\Form;
use vloop\entities\contracts\IField;
use vloop\entities\fields\Field;
use yii\rest\Controller;

class ProductController extends Controller
{
    public function actionCreate()
    {
        $productFamilies = new ProductFamilies();
        $productFamilies->addProductFamily(new ProductFamilyForm());

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