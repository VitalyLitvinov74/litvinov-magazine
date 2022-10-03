<?php


namespace app\controllers\v1;


use app\models\forms\CategoryForm;
use app\shop\categories\Categories;
use yii\rest\Controller;

class CategoriesController extends Controller
{
    public function actionCreate()
    {
        $categories = new Categories();
        return $categories->add(
            new CategoryForm()
        );
    }
}