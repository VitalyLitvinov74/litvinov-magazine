<?php


namespace app\models\shop\product\decorators;


use app\models\shop\product\contracts\IProductCard;
use app\models\shop\product\images\ProductImages;
use app\tables\TableFamiliesImages;

class CardWithImages implements IProductCard
{
    private $origin;
    private $images;

    public function __construct(IProductCard $origin)
    {
        $this->origin = $origin;
        $this->images = new ProductImages($origin);
    }

    public function id(): int
    {
        return $this->origin->id();
    }

    public function remove(): void
    {
        foreach ($this->images->list() as $image){
            $image->remove();
        }
        $this->origin->remove();
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return array_merge(
            $this->origin->printYourSelf(),
            [
                'images'=>$this->images->printYourSelf()
            ]
        );
    }
}