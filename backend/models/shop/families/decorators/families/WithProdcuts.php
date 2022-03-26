<?php


namespace app\models\shop\families\decorators\families;


use app\models\shop\families\contracts\IFamily;
use app\models\shop\families\contracts\WeFamilies;
use app\models\shop\families\decorators\family\WithProducts;
use vloop\entities\contracts\IForm;

class WithProdcuts implements WeFamilies
{
    private $origin;

    public function __construct(WeFamilies $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return IFamily[]
     */
    public function list(): array
    {

    }

    public function addFamily(IForm $form): WeFamilies
    {
        $family = new WithProducts(
            $this->origin
                ->addFamily($form)
                ->lastAdded()
        );
        $family->addProduct()

    }

    public function lastAdded(): IFamily
    {
        // TODO: Implement lastAdded() method.
    }

    public function printYourSelf(): array
    {
        // TODO: Implement printYourSelf() method.
    }
}