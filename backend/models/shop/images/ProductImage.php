<?php


namespace app\models\shop\images;


use app\models\shop\images\contracts\IImage;
use app\models\shop\images\Image;
use app\tables\TableProductImages;
use vloop\entities\contracts\IField;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\fields\Field;
use yii\db\StaleObjectException;
use yii\helpers\VarDumper;

class ProductImage implements IImage
{
    private $productId;

    public function __construct(IField $imageId)
    {
        $this->productId = $imageId;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        $record = $this->record(true);
        return array_merge(
            [
                'id' => $record->id,
                'path' => $record->path
            ],
            $this->imageFile()->printYourSelf()
        );
    }

    /**
     * Выкидывает текущий элемент из системы.
     *
     * @throws StaleObjectException
     */
    public function moveToTrash(): void
    {
        $this->imageFile()->moveToTrash();
        $this->record()->delete();
    }

    private function imageFile(): IImage
    {
        $imagePath = $this->record(true)->path;
        VarDumper::dump($this->record(true));
        return new Image(
            new Field(
                'path',
                $imagePath
            )
        );
    }

    private function record($needleRefresh = false)
    {
        $record = new TableProductImages([
            'product_id' => $this->productId->value(),
            'isNewRecord' => false
        ]);
        if ($needleRefresh) {
            $record = TableProductImages::find()
                ->where(['product_id'=>$this->productId->value()])
                ->one();
            if(!$record){
                throw new NotFoundEntity('Не получилось найти изображение');
            }
        }
        return $record;
    }
}