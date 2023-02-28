<?php
declare(strict_types=1);

namespace app\shop\product\events;

use app\models\forms\ChangeProductForm;
use app\shop\exceptions\ProductException;
use app\shop\product\contracts\ProductInterface;
use app\tables\TableCategories;
use app\tables\TableProducts;
use vloop\entities\contracts\IForm;

final class ChangeOrAddProductToCategoryBehavior implements ProductInterface
{
    public function __construct(private ProductInterface $origin, private TableProducts $record)
    {
    }

    /**
     * Меняет мета данные продукта
     * @param IForm $form
     * @return $this
     */
    public function change(ChangeProductForm $productForm): ProductInterface
    {
        $validatedFields = $productForm->validatedFields();
        if(!isset($validatedFields['categoryId'])){
            return $this->origin->change($productForm);
        }
        $this->record->link(
            'category',
            $this->categoryRecord($validatedFields['categoryId'])
        );
        return $this->origin->change($productForm);
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