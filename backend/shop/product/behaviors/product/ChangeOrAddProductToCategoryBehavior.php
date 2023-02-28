<?php
declare(strict_types=1);

namespace app\shop\product\behaviors\product;

use app\shop\exceptions\ProductException;
use app\shop\product\contracts\ProductInterface;
use app\shop\product\struct\ProductStruct;
use app\tables\TableCategories;
use app\tables\TableProducts;

final class ChangeOrAddProductToCategoryBehavior implements ProductInterface
{
    public function __construct(private ProductInterface $origin, private TableProducts $record)
    {
    }

    /**
     * Меняет мета данные продукта
     * @param ProductStruct $productStruct
     * @return $this
     * @throws ProductException
     */
    public function changeInformation(ProductStruct $productStruct): ProductInterface
    {
        if($productStruct->categoryId === 0){
            return $this->origin->changeInformation($productStruct);
        }
        $this->record->link(
            'category',
            $this->categoryRecord($productStruct->categoryId)
        );
        return $this->origin->changeInformation($productStruct);
    }

    private function categoryRecord(int $categoryId): TableCategories
    {
        $record = TableCategories::find()->where(['id'=>$categoryId])->one();
        if($record){
            /**@var TableCategories $record*/
            return $record;
        }
        throw new ProductException('Не удалось связать продукт и категорию. Нет категории с id = '. $categoryId);
    }
}