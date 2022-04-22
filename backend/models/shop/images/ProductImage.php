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
    private $imageId;

    public function __construct(IField $imageId)
    {
        $this->imageId = $imageId;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     * @throws NotFoundEntity
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
     * @throws StaleObjectException
     * @throws NotFoundEntity
     */
    public function moveToTrash(): void
    {
        $this->imageFile()->moveToTrash();
        $this->record()->delete();
    }

    private function imageFile(): IImage
    {
        $imagePath = $this->record(true)->path;
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
            'id' => $this->imageId->value(),
            'isNewRecord' => false
        ]);
        if ($needleRefresh) {
            $record = TableProductImages::find()
                ->where(['id'=>$this->imageId->value()])
                ->one();
            if(!$record){
                throw new NotFoundEntity('Не получилось найти изображение');
            }
        }
        return $record;
    }
}