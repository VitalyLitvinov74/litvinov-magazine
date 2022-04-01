<?php


namespace app\models\shop\product;


use app\models\shop\product\abstracts\ProductCardFactory;
use app\models\shop\product\contracts\IProductCard;
use app\models\shop\product\contracts\WeProductsCards;
use app\tables\TableFamilies;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\fields\Field;
use vloop\entities\yii2\queries\IImprovedQuery;
use vloop\entities\yii2\queries\InTable;

class ProductCardCollection extends ProductCardFactory implements WeProductsCards
{
    private $query;

    public function __construct(IImprovedQuery $query = null)
    {
        if (is_null($query)) {
            $this->__construct(new InTable(TableFamilies::class));
        }
        $this->query = $query;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        $self = [];
        foreach ($this->list() as $card) {
            $self[] = $card->printYourSelf();
        }
        return $self;
    }

    /**
     * @return IProductCard[]
     */
    public function list(): array
    {
        $records = $this->query->queryOfSearch()
            ->select('id')
            ->all();
        $list = [];
        foreach ($records as $record) {
            /**@var TableFamilies $record*/
            $list[] = $this->productCard($record->id);
        }
        return $list;
    }

    public function addProductCard(IForm $cardForm): IProductCard
    {
        $fields = $cardForm->validatedFields();
        $record = new TableFamilies([
            'desc' => $fields['description'],
            'short_desc' => $fields['shortDescription'],
            'title'=>$fields['title']
        ]);
        if ($record->save()) {
            return $this->productCard($record->id);
        }
        throw new NotSavedData($record->getErrors(), 422);
    }
    
    protected function productCard(int $id): IProductCard
    {
        return new ProductCard(
            new Field('id', $id)
        );
    }
}