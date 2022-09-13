<?php


namespace app\models\shop\products;


use app\models\shop\products\contracts\IProduct;
use app\models\shop\products\contracts\IProductCard;
use app\models\shop\products\contracts\WeProductCards;
use app\tables\TableProductCards;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use Yii;
use yii\db\Query;
use yii\helpers\VarDumper;

class ProductCards implements WeProductCards
{
    private $exampleOfCreate;

    public function __construct(callable $exampleOfCreateProductCart)
    {
        $this->exampleOfCreate = $exampleOfCreateProductCart;
    }

    public function add(IForm $form): IProductCard
    {
        $record = new TableProductCards();
        $record->load($form->validatedFields());
        $record->save();
        /**@var IProductCard $productCard*/
        $productCard = call_user_func($this->exampleOfCreate, $record);
        Yii::$app->getCache()->set(new CacheKey($productCard), $record, 60);
        return $productCard;
    }

    public function remove(IField $id): void
    {

    }

    public function listByQuery(Query $query)
    {

    }
}