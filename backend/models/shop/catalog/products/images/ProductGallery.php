<?php


namespace app\models\shop\catalog\products\images;


use app\models\shop\catalog\products\images\contracts\IProductImages;
use app\models\shop\images\contracts\IGallery;
use app\models\shop\images\contracts\IImage;
use app\models\shop\images\Gallery;
use app\models\shop\images\Image;
use app\tables\TableProductCards;
use app\tables\TableProductImages;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\Field;
use yii\base\InvalidConfigException;
use yii\web\UploadedFile;

class ProductGallery implements IGallery
{
    private $productId;

    public function __construct(IField $productId)
    {
        $this->productId = $productId;
    }


    /**
     * @return IImage[]
     */
    public function list(): array
    {
        $list = [];
        foreach ($this->records() as $record) {
            $list[] = $this->image($record->id);
        }
        return $list;
    }

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
     * @return IImage[]
     * @throws NotSavedData
     */
    public function addImages(IForm $imagesForm): array
    {
        $added = [];
        $savedImages = $this->gallery()->addImages($imagesForm); //сохераняем на диск
        foreach ($savedImages as $image) {
            $record = new TableProductImages([
                'path' => $image->printYourSelf()['path'],
                'product_id' => $this->productId->value()
            ]);
            if ($record->save()) {
                $added[] = $this->image($record->id);
            } else {
                throw new NotSavedData($record->getErrors(), 422);
            }
        }
        return $added;
    }

    private function gallery(): IGallery
    {
        return new Gallery(
            new Field('path', '@productImages/' . $this->productId->value())
        );
    }

    /**
     * @return TableProductImages[]
     */
    private function records(): array
    {
        return TableProductImages::find()
            ->where([
                'product_id' => $this->productId->value()
            ])
            ->all();
    }

    /**
     * @param int $imageId
     * @return IImage|ProductImage
     */
    private function image(int $imageId): IImage
    {
        return new ProductImage(
            new Field('id', $imageId)
        );
    }
}