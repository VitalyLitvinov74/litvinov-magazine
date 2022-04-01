<?php


namespace app\models\shop\product;


use app\models\queries\QueryByField;
use app\models\shop\product\contracts\IProductCard;
use app\tables\TableFamilies;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\fields\Field;
use vloop\entities\yii2\queries\IImprovedQuery;
use vloop\entities\yii2\queries\InTable;

class ProductCard implements IProductCard
{
    private $id;

    /**
     * ProductCard constructor.
     * @param IField|null $id - ид карточки продукта, если такого ид не существует
     *                        то будет выброшено исключение, см. @var TableFamilies в rules -> id
     */
    public function __construct(IField $id = null)
    {
        if(is_null($id)){
            $this->__construct(new Field('id', 0));

        }
        $this->id = $id;
    }

    public function id(): int
    {
        return $this->id->value();
    }

    public function remove(): void
    {
        TableFamilies::deleteAll(['id'=>$this->id()]);
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        $record = $this->record();
        $record->refresh();
        return [
            'id'=>$this->id(),
            'title'=>$record->title,
            'description'=>$record->desc,
            'shortDescription'=>$record->short_desc,
        ];
    }

    /**
     * @return TableFamilies
     */
    private function record(): TableFamilies
    {
        return new TableFamilies([
            'id' => $this->id(),
            'isNewRecord' => false
        ]);
    }
}