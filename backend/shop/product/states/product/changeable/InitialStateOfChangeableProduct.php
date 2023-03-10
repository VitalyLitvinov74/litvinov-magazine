<?php
declare(strict_types=1);

namespace app\shop\product\states\product\changeable;

use app\shop\exceptions\ProductException;
use app\shop\product\contracts\ProductInterface;
use vloop\entities\contracts\IForm;

final class InitialStateOfChangeableProduct implements ProductInterface
{
    public function __construct(private ProductInterface $originProduct)
    {
    }

    /**
     * Меняет мета данные продукта
     * @param IForm $productForm
     * @return $this
     * @throws ProductException
     */
    public function changeInformation(IForm $productForm): ProductInterface
    {
        return $this->originProduct->changeInformation($productForm);
    }
}