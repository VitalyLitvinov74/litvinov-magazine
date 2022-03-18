<?php


namespace app\models\shop\products;


use app\tables\TableProducts;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\yii2\criteria\IImprovedQuery;
use vloop\entities\yii2\criteria\InTable;

class Products implements WeProducts
{

    private $query;

    public function __construct(IImprovedQuery $query = null)
    {
        if (is_null($query)) {
            $this->__construct(
                new InTable(TableProducts::class)
            );
        }
        $this->query = $query;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return [];
    }

    /**
     * @return IProduct[] //TODO: может быть возвращать семейство продуктов?
     */
    public function list(): array
    {
        // TODO: Implement list() method.
    }

    /**
     * @param IForm $productForm
     * @return IProduct
     * @throws NotValidatedFields
     * @throws NotSavedData
     */
    public function addProduct(IForm $productForm): IProduct
    {
        $fields = $productForm->validatedFields();
        $record = new TableProducts([
            'count' => $fields['count'],
            'price' => $fields['price'] * 100,
            'vendor_code' => $fields['vendorCode']
        ]);
        if($record->save()){
            return new Product();
        }
        throw new NotSavedData($record->getErrors(), 422);
    }
}