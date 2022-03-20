<?php


namespace app\models\shop\products;


use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface WeProducts extends PrintYourSelf
{
    /**
     * @return IProduct[]
     */
    public function list(): array;

    /**
     * @param IForm $productForm
     * @return WeProducts - вернет новый объект с добавленными продуктами/товарами.
     */
    public function addProducts(IForm $productForm): WeProducts;

    /**
     * @param IField $id
     * @return IProduct - Товар полученный из текущей коллекции взятый по ид.
     */
    public function product(IField $id): IProduct;
}