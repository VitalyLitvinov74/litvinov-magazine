<?php


namespace app\controllers\v1;




use app\models\collections\CollectionByForm;
use app\models\collections\ObjectCollectionByQuery;
use app\models\forms\ProductCardForm;
use app\models\media\JsonMedia;
use app\models\shop\products\characteristics\Characteristic;
use app\models\shop\products\decorators\CardWithProducts;
use app\models\shop\products\decorators\ProductCardById;
use app\models\shop\products\decorators\ProductCardMySQL;
use app\models\shop\products\decorators\ProductWithCharacteristics;
use app\models\shop\products\Product;
use app\models\shop\products\ProductCard;
use app\tables\TableProductCards;
use vloop\entities\fields\Field;
use vloop\entities\fields\FieldOfForm;
use Yii;
use yii\helpers\VarDumper;
use yii\rest\Controller;
use yii\web\JsonResponseFormatter;
use yii\web\Response;

class ProductController extends Controller
{
    public function actionCreate()
    {
        $form = new ProductCardForm();

        $productCard = new CardWithProducts(
            new ProductCard(
                new FieldOfForm($form, 'title'),
                new FieldOfForm($form, 'shortDescription'),
                new FieldOfForm($form, 'description')
            ),
            new CollectionByForm( //Products collection into productCard
                function (array $item) use ($form){
                    return new ProductWithCharacteristics(
                        new Product(
                            new Field('price', $item['price']),
                            new Field('count', $item['count'])
                        ),
                        new CollectionByForm( //characteristic collection in Product
                            function (array $item){
                                return new Characteristic(
                                    $item['type'],
                                    $item['value']
                                );
                            },
                            'products.characteristics',
                             $form
                        )
                    );
                },
                'products',
                $form
            )
        );
//        Yii::$app->response->content =
//            $productCard->printTo(new JsonMedia());
        return $productCard
//            ->printTo(new TableProductCards())
//            ->commit()
            ->printTo(new JsonMedia());
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