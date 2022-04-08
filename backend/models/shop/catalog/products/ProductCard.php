<?php


namespace app\models\shop\catalog\products;


use app\models\shop\catalog\products\contracts\IProductCard;
use app\tables\TableProductCards;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\fields\Field;
use yii\db\StaleObjectException;

class ProductCard implements IProductCard
{
    private $id;

    public function __construct(IField $id)
    {
        $this->id = $id;
    }

    public function printYourSelf(): array
    {
        $record = $this->record();
        $record->refresh();
        return [
            'id'=>$record->id,
            'title' => $record->title,
            'shortDescription' => $record->short_description,
            'description' => $record->description
        ];
    }

    /**
     * @throws StaleObjectException
     */
    public function moveToTrash(): void
    {
        $this->record()->delete();
    }

    /**
     * @return IProductCard - новый объект, скопированный в систему
     * @throws NotSavedData
     */
    public function copyToSystem(): IProductCard
    {
        $origin = $this->record();
        $origin->refresh();
        $record = new TableProductCards([
            'description' => $origin->description,
            'short_description' => $origin->short_description,
            'title' => $origin->title
        ]);
        return $this->saveRecord($record);
    }

    public function changeDescriptions(IForm $descriptionForm): IProductCard
    {
        $record = $this->record();
        $fields = $descriptionForm->validatedFields();
        $record->description = $fields['description'];
        $record->short_description = $fields['shortDescription'];
        return $this->saveRecord($record);
    }

    public function changeTitle(IField $title): IProductCard
    {
        $record = $this->record();
        $record->title = $title->value();
        return $this->saveRecord($record);
    }

    private function saveRecord(TableProductCards $record): self
    {
        if ($record->save()) {
            return new self(
                new Field('id', $record->id)
            );
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    private function record(): TableProductCards
    {
        return new TableProductCards([
            'id' => $this->id->value(),
            'isNewRecord' => false
        ]);
    }
}