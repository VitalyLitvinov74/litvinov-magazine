<?php


namespace app\models\shop\families;


use app\models\forms\FamilyForm;
use app\models\shop\families\contracts\IFamily;
use app\tables\TableFamilies;
use app\tables\TableFamiliesImages;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\Field;

class FamilySQL extends AbstractFamily implements IFamily
{
    private $id;

    public function __construct(IField $id)
    {
        $this->id = $id;
    }

    public function remove(): void
    {
        TableFamilies::deleteAll(['id' => $this->id->value()]);
    }

    /**
     * @param IForm| FamilyForm $contentForm
     * @return IFamily
     * @throws NotValidatedFields
     * @throws NotSavedData
     */
    public function changeContent(IForm $contentForm): IFamily
    {
        $fields = $contentForm->validatedFields();
        $record = $this->record();
        $record->title = $fields['title'];
        $record->desc = $fields['description'];
        $record->short_desc = $fields['shortDescription'];
        if($record->save()){
            return $this;
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    public function printYourSelf(): array
    {
        return parent::printYourSelf();
    }

    protected function record(): TableFamilies
    {
        return new TableFamilies([
            'id' => $this->id->value(),
            'isNewRecord' => false
        ]);
    }
}