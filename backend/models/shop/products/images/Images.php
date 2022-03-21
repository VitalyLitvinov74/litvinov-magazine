<?php


namespace app\models\shop\products\images;


use app\tables\TableImages;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\fields\Field;

class Images implements WeImages
{
    private $added;
    private $imputed;

    /**
     * Images constructor.
     * @param IImage[] $images
     */
    public function __construct(array $images = [])
    {
        $this->imputed = $images;
    }

    public function image(IField $id): IImage
    {
        return new Image($id);
    }

    public function addImages(IForm $imagesForm)
    {
        $fields = $imagesForm->validatedFields();

        $record = new TableImages([
            'path' => ''
        ]);
        if($record->save()){
            return $this->image(
                new Field('id', $record->id)
            );
        }
        throw new NotSavedData($record->getErrors(), 422);
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
     * @return IImage[]
     */
    public function list(): array
    {
        return array_unique(
            array_merge(
                $this->added,
                $this->imputed
            )
        );
    }


}