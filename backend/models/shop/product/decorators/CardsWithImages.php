<?php


namespace app\models\shop\product\decorators;


use app\models\shop\product\contracts\IProductCard;
use app\models\shop\product\contracts\WeProductsCards;
use vloop\entities\contracts\IForm;

class CardsWithImages implements WeProductsCards
{
    private $originCards;

    public function __construct(WeProductsCards $originCards)
    {
        $this->originCards = $originCards;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        // TODO: Implement printYourSelf() method.
    }

    /**
     * @return IProductCard[]
     */
    public function list(): array
    {
        // TODO: Implement list() method.
    }

    public function addProductCard(IForm $cardForm): IProductCard
    {
        $card = $this->originCards->addProductCard($cardForm);
    }

    protected function productCard(IProductCard $fromOrigin):IProductCard{
        return new CardWithImages(
            $fromOrigin
        );
    }
}