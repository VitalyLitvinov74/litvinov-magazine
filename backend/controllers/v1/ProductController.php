<?php


namespace app\controllers\v1;


use app\models\collections\CollectionByArray;
use app\models\collections\CollectionByForm;
use app\models\collections\ObjectCollectionByQuery;
use app\models\forms\FormFamily;
use app\models\forms\FamilyForm;
use app\models\forms\ProductCardForm;
use app\models\forms\ProductForm;
use app\models\media\ArrayMedia;
use app\models\media\JsonMedia;
use app\models\shop\products\characteristics\Characteristic;
use app\models\shop\products\decorators\CardWithProducts;
use app\models\shop\products\decorators\ProductCardById;
use app\models\shop\products\decorators\ProductCardMySQL;
use app\models\shop\products\decorators\ProductMysql;
use app\models\shop\products\decorators\ProductWithCharacteristics;
use app\models\shop\products\Product;
use app\models\shop\products\ProductCard;
use app\tables\TableProductCards;
use app\tables\TableProductCharacteristics;
use app\tables\TableProducts;
use vloop\entities\fields\Field;
use vloop\entities\fields\FieldOfForm;
use Yii;
use yii\helpers\ArrayHelper;
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
                $form,
                'products',
                function (array $itemProduct) {
                    return
                        new ProductWithCharacteristics( // Concrete product
                            new Product(
                                new Field('price', $itemProduct['price']),
                                new Field('count', $itemProduct['count'])
                            ),
                            new CollectionByArray( // Collection of characteristics
                                ArrayHelper::getValue($itemProduct, 'characteristics', []),
                                'characteristics',
                                function (array $characteristic) {
                                    return new Characteristic( // Concrete Characteristic
                                        $characteristic['name'],
                                        $characteristic['value']
                                    );
                                }
                            )
                        );
                }
            )
        );
        return $productCard
            ->printTo(new TableProductCards())
            ->commit()
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
                return
                    new CardWithProducts(
                        new ProductCardMySQL(
                            new Field('id', $record->id),
                            new ProductCard(
                                new Field('id', $record->title),
                                new Field('shortDescription', (string)$record->short_description),
                                new Field('description', $record->description)
                            )
                        ),
                        new CollectionByArray(
                            $record->products,
                            'products',
                            function (TableProducts $product) {
                                return
                                    new ProductWithCharacteristics(
                                        new ProductMysql(
                                            new Field('id', $product->id),
                                            new Product(
                                                new Field('title', $product->price),
                                                new Field('count', $product->count)
                                            )
                                        ),
                                        new CollectionByArray(
                                            $product->characteristics,
                                            'characteristics',
                                            function (TableProductCharacteristics $characteristic) {
                                                return new Characteristic(
                                                    $characteristic->name,
                                                    $characteristic->value
                                                );
                                            }
                                        )
                                    );
                            }
                        )
                    );
            }
        );
        return $list
            ->printTo(new JsonMedia());
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