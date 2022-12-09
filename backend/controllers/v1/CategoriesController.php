<?php


namespace app\controllers\v1;


use app\models\FieldValue;
use app\models\forms\CategoryForm;
use app\shop\categories\Categories;
use app\shop\categories\CategorySql;
use app\shop\categories\decorators\WithBuildingTree;
use vloop\entities\fields\Field;
use vloop\entities\fields\FieldOfForm;
use Yii;
use yii\rest\Controller;

class CategoriesController extends Controller
{
    public function actionCreate()
    {
        $categories = new WithBuildingTree(
            new Categories()
        );
        $test = $categories->add(
            new CategoryForm()
        );
        return $test;
    }

    public function actionRebuildTree(){
        $category = new CategorySql(
            new Field('id', Yii::$app->request->post('id'))
        );
        $category->buildTree(new FieldValue(Yii::$app->request->post('parentId')));
    }
}