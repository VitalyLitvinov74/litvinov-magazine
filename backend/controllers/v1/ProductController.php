<?php


namespace app\controllers\v1;


use app\models\chains\ChainInTransaction;
use app\models\chains\ChainOfResponsibility;
use app\models\chains\DynamicElement;
use app\models\collections\FactoryObjectByRecord;
use app\models\collections\ObjectCollectionByQuery;
use app\models\forms\EmptyForm;
use app\models\forms\ImagesForm;
use app\models\forms\ProductCardForm;
use app\models\media\JsonMedia;
use app\models\shop\images\decorators\PrintedWithImages;
use app\models\shop\products\contracts\IProductCard;
use app\models\shop\products\decorators\WithGallery;
use app\models\shop\images\ProductGallery;
use app\models\shop\products\ProductCard;
use app\models\shop\products\ProductCardByPost;
use app\models\shop\products\ProductCardByQuery;
use app\models\shop\products\ProductCardFactory;
use app\models\shop\images\Gallery;
use app\models\shop\images\PostGallery;
use app\models\shop\products\ProductCardSQL;
use app\tables\TableProductCards;
use Exception;
use vloop\entities\exceptions\AbstractException;
use vloop\entities\fields\Field;
use vloop\entities\fields\FieldOfForm;
use vloop\entities\yii2\forms\IdForm;
use Yii;
use yii\helpers\VarDumper;
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
        $productCard = ProductCardSQL::byId(
            new FieldOfForm(
                new IdForm('get'),
                'id'
            )
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
                return new ProductCardSQL(
                    new Field('id', $record->id),
                    new ProductCard(
                        new Field('id', $record->title),
                        new Field('shortDescription', $record->short_description),
                        new Field('description', $record->description)
                    )
                );
            }
        );
        return $list
            ->printTo(new JsonMedia())
            ->toArray();
    }

    public function actionList()
    {

    }

    public function actionDelete(int $id)
    {
        $product = new ProductCardByQuery(
            TableProductCards::find()->where("id=:id"),
            [
                new Field('id', $id)
            ]
        );
        $product->remove();
    }

    public function actionChangeDescriptions()
    {

    }
}