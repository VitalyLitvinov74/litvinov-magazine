<?php


namespace app\controllers\v1;


use app\models\collections\CollectionByArray;
use app\models\collections\CollectionByForm;
use app\models\collections\CollectionByQuery;
use app\models\forms\ProductCardForm;
use app\models\media\JsonMedia;
use app\models\media\RelationForPrint;
use app\models\media\RelationForRemove;
use app\models\shop\products\characteristics\Characteristic;
use app\models\shop\products\decorators\ProductCardById;
use app\models\shop\products\decorators\ProductCardMySQL;
use app\models\shop\products\decorators\ProductMysql;
use app\models\shop\products\Product;
use app\models\shop\products\ProductCard;
use app\tables\TableProductCards;
use app\tables\TableProductCharacteristics;
use app\tables\TableProducts;
use vloop\entities\fields\Field;
use vloop\entities\fields\FieldOfForm;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\rest\Controller;

class ProductController extends Controller
{

    public function actionCreate()
    {
        $form = new ProductCardForm();
        $productCard = new RelationForPrint(
            new ProductCard(
                new FieldOfForm($form, 'title'),
                new FieldOfForm($form, 'shortDescription'),
                new FieldOfForm($form, 'description')
            ),
            [
                'products' =>
                    new CollectionByForm( //Products collection into productCard
                        $form,
                        'products',
                        function (array $itemProduct) {
                            return
                                new RelationForPrint( // Concrete product
                                    new Product(
                                        new Field('price', $itemProduct['price']),
                                        new Field('count', $itemProduct['count'])
                                    ),
                                    [
                                        'characteristics' =>
                                            new CollectionByArray( // Collection of characteristics
                                                ArrayHelper::getValue($itemProduct, 'characteristics', []),
                                                function (array $characteristic) {
                                                    return new Characteristic( // Concrete Characteristic
                                                        $characteristic['name'],
                                                        $characteristic['value']
                                                    );
                                                }
                                            )
                                    ]
                                );
                        }
                    )
            ]
        );
        return $productCard
            ->printTo(new TableProductCards())
            ->commit()
            ->printTo(new JsonMedia());
    }

    public function actionById(int $id)
    {
        $productCard = new RelationForPrint(
            new ProductCardById(
                new Field('id', $id)
            ),
            [
                'products' => new CollectionByQuery(
                    TableProducts::find()
                        ->rightJoin('products_via_cards', 'product_id = products.id')
                        ->where(['card_id' => $id]),
                    function (TableProducts $product) {
                        return new RelationForPrint(
                            new ProductMysql(
                                new Field('id', $product->id),
                                new Product(
                                    new Field('count', $product->price),
                                    new Field('price', $product->count)
                                )
                            ),
                            [
                                'characteristics' => new CollectionByArray(
                                    $product->characteristics,
                                    function (TableProductCharacteristics $characteristic) {
                                        return new Characteristic(
                                            $characteristic->name,
                                            $characteristic->value
                                        );
                                    }
                                )
                            ]
                        );
                    }
                )
            ]
        );
        return $productCard
            ->printTo(new JsonMedia());
    }

    public function actionShowAll()
    {
        $list = new CollectionByQuery(
            TableProductCards::find()->where(['id' => 140])->orderBy(['id' => SORT_DESC]),
            function (TableProductCards $record) {
                return
                    new RelationForPrint(
                        new ProductCardMySQL(
                            new Field('id', $record->id),
                            new ProductCard(
                                new Field('id', $record->title),
                                new Field('shortDescription', (string)$record->short_description),
                                new Field('description', $record->description)
                            )
                        ),
                        [
                            "products" => new CollectionByArray(
                                $record->products,
                                function (TableProducts $product) {
                                    return
                                        new RelationForPrint(
                                            new ProductMysql(
                                                new Field('id', $product->id),
                                                new Product(
                                                    new Field('title', $product->price),
                                                    new Field('count', $product->count)
                                                )
                                            ),
                                            [
                                                'characteristics' => new CollectionByArray(
                                                    $product->characteristics,
                                                    function (TableProductCharacteristics $characteristic) {
                                                        return new Characteristic(
                                                            $characteristic->name,
                                                            $characteristic->value
                                                        );
                                                    }
                                                )
                                            ]
                                        );
                                }
                            )
                        ]
                    );
            }
        );
        return $list
            ->printTo(new JsonMedia());
    }

    public function actionDelete(int $id)
    {
        $product = new CollectionByQuery(
            TableProductCards::find()
                ->where(
                    'id=:id',
                    [':id' => new Field('id', $id)]
                )
                ->with('products', 'products.characteristics'),
            function (TableProductCards $record) {
                return new RelationForRemove(
                    new ProductCardMySQL(
                        new Field('id', $record->id),
                        new ProductCard(
                            new Field('title', $record->title),
                            new Field('shortDescription', $record->short_description),
                            new Field('Description', $record->description)
                        )
                    ),
                    [
                        "products" => new CollectionByArray(
                            $record->products,
                            function (TableProducts $product) {
                                return new RelationForRemove(
                                    new ProductMysql(
                                        new Field('', $product->id),
                                        new Product(
                                            new Field('price', $product->price),
                                            new Field('count', $product->count)
                                        )
                                    ),
                                    [
                                        'characteristics' => new CollectionByArray(
                                            $product->characteristics,
                                            function (TableProductCharacteristics $characteristic) {
                                                return new Characteristic(
                                                    $characteristic->name,
                                                    $characteristic->value
                                                );
                                            }
                                        )
                                    ]
                                );
                            }
                        )
                    ]
                );
            }
        );
        $product->moveToTrash();
    }
}