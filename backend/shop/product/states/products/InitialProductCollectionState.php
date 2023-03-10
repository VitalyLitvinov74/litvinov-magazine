<?php
declare(strict_types=1);

namespace app\shop\product\states\products;

use app\shop\exceptions\ProductException;
use app\shop\product\contracts\AddableProductInterface;
use app\shop\product\contracts\ProductsInterface;
use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use yii\db\Query;

final class InitialProductCollectionState implements ProductsInterface
{
    public function __construct(private readonly AddableProductInterface $originalProductCollection)
    {
    }

    /**
     * @param IForm $productForm
     * @return TableProducts
     * @throws NotValidatedFields
     * @throws ProductException
     */
    public function add(IForm $productForm): TableProducts
    {
        return $this->originalProductCollection->add($productForm);
    }

    public function remove(IField $id): void
    {
        $this->originalProductCollection->remove($id);
    }

    public function findOne(Query $query): TableProducts
    {
        return $this->originalProductCollection->findOne($query);
    }

    /**
     * @return TableProducts[]
     */
    public function findAll(Query $query): array
    {
        return $this->originalProductCollection->findAll($query);
    }
}