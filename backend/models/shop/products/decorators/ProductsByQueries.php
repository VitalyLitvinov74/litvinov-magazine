<?php


namespace app\models\shop\products\decorators;


use app\models\shop\products\IProduct;
use app\models\shop\products\Product;
use app\models\shop\products\WeProducts;
use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\Field;
use vloop\entities\yii2\criteria\IImprovedQuery;
use vloop\entities\yii2\criteria\InTable;

class ProductsByQueries extends AbstracProducts
{

    private $query;
    private $origin;

    public function __construct(WeProducts $products, IImprovedQuery $query = null)
    {
        if (is_null($query)) {
            $this->__construct(
                $products,
                new InTable(TableProducts::class)
            );
        }
        $this->origin = $products;
        $this->query = $query;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return parent::printYourSelf();
    }

    /**
     * @return IProduct[]
     */
    public function list(): array
    {
        $productsByQueries = [];
        $originList = $this->origin->list();
        foreach ($this->query->queryOfSearch()->each() as $productRecord){
            /**@var TableProducts $productRecord*/
            $productsByQueries[] = $this->product(
                new Field('id', $productRecord->id)
            );
        }
        return array_unique(
            array_merge($originList, $productsByQueries)
        );
    }

    /**
     * @param IForm $productForm
     * @return IProduct
     */
    public function addProducts(IForm $productForm): IProduct
    {
        return $this->origin->addProducts($productForm);
    }

    /**
     * @param IField $id
     * @return IProduct - Товар полученный из текущей коллекции взятый по ид.
     */
    public function product(IField $id): IProduct
    {
        return $this->origin->product($id);
    }
}