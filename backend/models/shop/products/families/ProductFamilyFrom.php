<?php


namespace app\models\shop\products\families;


use app\models\forms\FamilyForm;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;

class ProductFamilyFrom implements IProductFamily
{
    private $form;

    /**
     * FamilyByForm constructor.
     * @param IForm|FamilyForm $familyForm
     */
    public function __construct(IForm $familyForm)
    {
        $this->form = $familyForm;
    }

    public function changeTitle(IField $titleForm): IProductFamily
    {
        $this->form->title = $titleForm->value(); //TODO: Проверить будет ли перезаписывать значение
        return new self(
            clone $this->form
        );
    }

    public function changeDesc(IField $descForm): IProductFamily
    {
        $this->form->description = $descForm->value();
        return new self(
            clone $this->form
        );
    }

    public function changeShortDesc(IField $shortDescForm): IProductFamily
    {
        $this->form->shortDescription = $shortDescForm->value();
        return new self(
            clone $this->form
        );
    }

    /**
     * Удалит семейство продуктов из системы.
     */
    public function remove(): void
    {

    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     * @throws NotValidatedFields
     */
    public function printYourSelf(): array
    {
        $fields = $this->form->validatedFields();
        return [
            'id' => 0,
            'description' => $fields['description'],
            'shortDescription' => $fields['shortDescription'],
            'title' => $fields['title']
        ];
    }
}