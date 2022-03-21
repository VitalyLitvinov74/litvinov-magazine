<?php


namespace app\models\shop\products;


use app\models\shop\products\decorators\AbstracProducts;
use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\Field;

class Products extends AbstracProducts
{
    private $products;
    private $addedProducts = [];

    /**
     * Products constructor.
     * @param IProduct[] $products
     */
    public function __construct(array $products = [])
    {
        $this->products = $products;
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
        return array_unique(
            array_merge($this->products, $this->addedProducts)
        );
    }

    /**
     * @param IForm $productForm
     * @return IProduct
     * @throws NotValidatedFields
     * @throws NotSavedData
     */
    public function addProducts(IForm $productForm): WeProducts
    {
        $fields = $productForm->validatedFields();
        $products = $fields['products'];
        foreach ($products as $product){
            $record = new TableProducts([
                'count' => $product['count'],
                'price' => $product['price'] * 100,
                'vendor_code' => $product['vendorCode']
            ]);
            if($record->save()){
                $product = $this->product(new Field('id', $record->id));
                $this->addedProducts[] = $product;
                return $product;
            }
            throw new NotSavedData($record->getErrors(), 422);
        }
        return clone $this;
    }

    /**
     * @param IField $id
     * @return IProduct - вернет обычный товар, из бд.
     * если в бд его нет, то вернет ошибку, пр ииспользовании этого товара
     */
    public function product(IField $id): IProduct
    {
       return new Product($id);
    }
}