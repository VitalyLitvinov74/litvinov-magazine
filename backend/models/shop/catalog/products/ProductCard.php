<?php


namespace app\models\shop\catalog\products;


use app\models\shop\catalog\products\contracts\IProductCard;
use app\tables\TableProductCards;
use vloop\entities\contracts\IField;
use yii\db\StaleObjectException;

class ProductCard implements IProductCard
{
    private $id;

    public function __construct(IField $id)
    {
        $this->id = $id;
    }

    public function changeDescriptions(): IProductCard
    {

    }

    public function changeTitle(): IProductCard
    {

    }

    public function printYourSelf(): array
    {

    }

    /**
     * @throws StaleObjectException
     */
    public function moveToTrash(): void
    {
        $this->record()->delete();
    }

    private function record(): TableProductCards
    {
        return new TableProductCards([
            'id' => $this->id->value(),
            'isNewRecord' => false
        ]);
    }
}