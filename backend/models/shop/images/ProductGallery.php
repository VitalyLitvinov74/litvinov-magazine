<?php


namespace app\models\shop\images;

use app\models\shop\images\contracts\IGallery;
use app\models\shop\images\contracts\IImage;
use app\tables\TableProductImages;
use vloop\entities\contracts\IField;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\fields\Field;
use Yii;
use yii\helpers\VarDumper;

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
     * @param IGallery $needleMerge
     * @return IGallery
     * @throws NotSavedData
     */
    public function mergeGalleries(IGallery $needleMerge): IGallery
    {
        $folderGallery = $this->gallery()->mergeGalleries($needleMerge); //сохераняем на диск
        foreach ($folderGallery->list() as $image) {
            $record = new TableProductImages([
                'path' => $image->printYourSelf()['path'],
                'product_id' => $this->productId->value()
            ]);
            if (!$record->save()) {
                throw new NotSavedData($record->getErrors(), 422);
            }
        }
        return $this;
    }

    private function gallery(): IGallery
    {
        return new Gallery(
            new Field('path', Yii::getAlias('@product/') . $this->productId->value())
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