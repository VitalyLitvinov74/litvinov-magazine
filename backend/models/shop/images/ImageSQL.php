<?php


namespace app\models\shop\images;


use app\models\shop\images\contracts\IImage;
use app\tables\TableFamiliesImages;
use vloop\entities\contracts\IField;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\fields\Field;

class ImageSQL implements IImage
{

    private $id;

    public function __construct(IField $id)
    {
        $this->id = $id;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return $this->origin()->printYourSelf();
    }

    public function remove(): void
    {
        TableFamiliesImages::deleteAll(['id'=>$this->id->value()]);
        $this->origin()->remove();
    }

    public function rename(IField $newName): IImage
    {
        $record = $this->record();
        $file = $this->origin()->rename($newName);
        $record->path = $file->printYourSelf()['path'];
        if($record->save()){
            return $this;
        };
        throw new NotSavedData($record->getErrors(), 422);

    }

    private function record(): TableFamiliesImages{
        $record = TableFamiliesImages::find()->where(['id'=>$this->id->value()])->one();
        if($record){
            return $record;
        }
        throw new NotFoundEntity("Не удалось найти изображение продукта");
    }

    private function origin(): IImage{
        return new Image(
            $this->record()->path
        );
    }
}