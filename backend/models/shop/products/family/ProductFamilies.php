<?php


namespace app\models\shop\products\family;


use app\models\shop\products\IProduct;
use app\models\shop\products\labels\IProductLabel;
use app\models\shop\products\WeProducts;
use app\tables\TableProductsFamilies;
use vloop\entities\contracts\IField;

class ProductFamilies implements WeProductFamilies
{
    private $added = [];
    private $families;

    /**
     * ProductFamilies constructor.
     * @param IProductFamily[] $productFamilies
     */
    public function __construct(array $productFamilies = [])
    {
        $this->families = $productFamilies;
    }

    /**
     * @param IProductFamily[] $productFamilies
     * @return ProductFamilies
     */
    public static function init(array $productFamilies = [])
    {
        return new self($productFamilies);
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {

    }

    /**
     * @param IProductLabel $productLabel
     * @param WeProducts    $products
     * @return IProductFamily
     */
    public function add(IProductLabel $productLabel, WeProducts $products): IProductFamily
    {
        foreach ($products->list() as $product){
            $record = new TableProductsFamilies([
                'product_id' => $product->printYourSelf()['id'],
                'label_id' => $productLabel->printYourSelf()['id']
            ]);
            if($record->save()){

            }
        }

    }

    /**
     * @return IProductFamily[]
     */
    public function showAll(): array
    {
        return array_merge($this->families, $this->added);
    }

    /**
     * @param IField $fieldId
     * @return IProductFamily - вернет семейство продуктов по ид, из бд.
     */
    public function productFamily(IField $fieldId): IProductFamily
    {

    }
}