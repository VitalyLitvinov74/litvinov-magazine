<?php


namespace app\models\shop\catalog\products\images;


use app\models\shop\catalog\products\images\contracts\IProductImages;
use app\models\shop\images\contracts\IImage;
use app\models\shop\images\Image;
use app\tables\TableImages;
use app\tables\TableProductCards;
use app\tables\TableProductImages;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\Field;
use yii\base\InvalidConfigException;
use yii\web\UploadedFile;

class ProductImages implements IProductImages
{
    private $productId;

    public function __construct(IField $productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return IImage[]
     * @throws InvalidConfigException
     */
    public function list(): array
    {
        $list = [];
        foreach ($this->records() as $record) {
            $list[] = $this->image($record->id);
        }
        return $list;
    }

    /**
     * @return array
     * @throws InvalidConfigException
     */
    public function printYourSelf(): array
    {
        $self = [];
        foreach ($this->list() as $image) {
            $self[] = $image->printYourSelf();
        }
        return $self;
    }

    /**
     * @param IForm $imagesForm
     * @return IProductImages
     * @throws NotSavedData
     * @throws NotValidatedFields
     */
    public function addImages(IForm $imagesForm): IProductImages
    {
        $fields = $imagesForm->validatedFields();
        foreach ($fields['images'] as $image) {
            /**@var UploadedFile $image */
            if (!$image->saveAs('')) {
                throw new NotSavedData([], 422);
            }
            $record = new TableImages([
                'path' => ''
            ]);
            if (!$record->save()) {
                throw new NotSavedData($record->getErrors(), 422);
            }
            $record->refresh();
            $viaRecord = new TableProductImages([
                'product_id' => $this->productId->value(),
                'image_id' => $record->id
            ]);
            if (!$viaRecord->save()) {
                throw new NotSavedData($viaRecord->getErrors(), 422);
            }
        }
        return new self($this->productId);
    }

    /**
     * @return TableImages[]
     * @throws InvalidConfigException
     */
    private function records(): array
    {
        $record = new TableProductCards([
            'id' => $this->productId->value(),
            'isNewRecord' => false
        ]);
        return $record->getImages();
    }

    private function image(int $id): IImage
    {
        return new Image(
            new Field('id', $id)
        );
    }
}