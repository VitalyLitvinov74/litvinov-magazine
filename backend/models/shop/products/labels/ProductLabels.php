<?php


namespace app\models\shop\products\labels;


use app\tables\TableProductLabels;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\Field;

class ProductLabels implements WeProductLabels
{
    private $added = [];
    private $labels;

    /**
     * ProductLabels constructor.
     * @param IProductLabel[] $labels
     */
    public function __construct(array $labels = [])
    {
        $this->labels = $labels;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return [];
    }

    /**
     * @return IProductLabel[] - вернет описания продуктов
     */
    public function list(): array
    {
        return array_merge($this->labels, $this->added);
    }

    /**
     * @param IForm $productLabelForm
     * @return IProductLabel
     * @throws NotValidatedFields
     * @throws NotSavedData
     */
    public function addLabel(IForm $productLabelForm): IProductLabel
    {
        $fields = $productLabelForm->validatedFields();
        $record = new TableProductLabels([
            'title' => $fields['title'],
            'desc' => $fields['description'],
            'short_desc' => $fields['short_description']
        ]);
        if($record->save()){
            return $this->label(
                new Field('id', $record->id)
            );
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    /**
     * @param IField $fieldId
     * @return IProductLabel - вернет объект ProductLabel взятый из бд.
     */
    public function label(IField $fieldId): IProductLabel
    {
        return new ProductLabel($fieldId);
    }
}