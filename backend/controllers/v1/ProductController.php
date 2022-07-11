<?php


namespace app\controllers\v1;




use app\models\collections\ObjectCollectionByQuery;
use app\models\forms\ProductCardForm;
use app\models\media\JsonMedia;
use app\models\shop\products\decorators\ProductCardById;
use app\models\shop\products\decorators\ProductCardMySQL;
use app\models\shop\products\ProductCard;
use app\tables\TableProductCards;
use vloop\entities\fields\Field;
use vloop\entities\fields\FieldOfForm;
use yii\rest\Controller;

class ProductController extends Controller
{
    public function runAction($id, $params = [])
    {
        return parent::runAction($id, $params);
    }

    public function actionCreate()
    {
        $form = new ProductCardForm();
        $productCard = new ProductCard(
            new FieldOfForm($form, 'title'),
            new FieldOfForm($form, 'shortDescription'),
            new FieldOfForm($form, 'description')
        );
        return $productCard
            ->printTo(new TableProductCards())
            ->commit()
            ->printTo(new JsonMedia())
            ->toArray();
    }

    public function actionById($id)
    {
        $productCard = new ProductCardById(
            new Field('id', $id)
        );
        return $productCard
            ->printTo(new JsonMedia())
            ->toArray();
    }

    public function addImage()
    {

    }

    public function actionShowAll()
    {
        $list = new ObjectCollectionByQuery(
            TableProductCards::find(),
            function (TableProductCards $record) {
                return new ProductCardMySQL(
                    new Field('id', $record->id),
                    new ProductCard(
                        new Field('id', $record->title),
                        new Field('shortDescription', (string) $record->short_description),
                        new Field('description', $record->description)
                    )
                );
            }
        );
        return $list
            ->printTo(new JsonMedia())
            ->toArray();
    }

    public function actionDelete(int $id)
    {
        $product = new ProductCardById(
            new Field('id', $id)
        );
        $product->remove();
    }

    public function actionChangeDescriptions()
    {

    }
}