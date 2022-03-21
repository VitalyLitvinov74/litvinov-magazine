<?php


namespace app\models\shop\products\families;


use app\models\shop\products\families\decorators\AbstractFamily;
use app\tables\TableFamilies;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;

class FamilySQLSpeaking extends AbstractFamily
{
    private $id;

    public function __construct(IField $fieldId)
    {
        $this->id = $fieldId;
    }

    /**
     * @param IField $titleForm
     * @return IProductFamily
     * @throws NotFoundEntity
     * @throws NotSavedData
     */
    public function changeTitle(IField $titleForm): IProductFamily
    {
        $record = $this->record($this->id);
        $record->title = $titleForm->value();
        if ($record->save()) {
            return $this;
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    public function changeDesc(IField $descForm): IProductFamily
    {
        $record = $this->record($this->id);
        $record->desc = $descForm->value();
        if($record->save()){
            return $this;
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    public function changeShortDesc(IField $shortDescForm): IProductFamily
    {
        $record = $this->record($this->id);
        $record->short_desc = $shortDescForm->value();
        if($record->save()){
            return $this;
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    /**
     * Удалит семейство продуктов из системы.
     */
    public function remove(): void
    {
        TableFamilies::deleteAll(['id'=>$this->id->value()]);
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     * @throws NotFoundEntity
     */
    public function printYourSelf(): array
    {
        $record = $this->record($this->id, true);
        return [
            'id' => $record->id,
            'description' => $record->desc,
            'shortDescription' => $record->short_desc,
            'title' => $record->title
        ];
    }
}