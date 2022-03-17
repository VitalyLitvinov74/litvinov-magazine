<?php


namespace app\controllers\v1;


use app\models\shop\products\decorators\ImproveProducts;
use app\models\shop\products\Products;
use yii\rest\Controller;

class ProductController extends Controller
{
    public function actionCreate()
    {
        $products = new ImproveProducts(
            new Products()
        );
        $products->add();
        
        return '';
    }
    
    public function actionList(){
        
    }
    
    public function actionDelete(){
        
    }
    
    public function actionChangeDescription(){
        
    }

    public function actionChangeImages()
    {
        
    }
}