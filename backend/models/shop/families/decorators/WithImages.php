<?php


namespace app\models\shop\families\decorators;


use app\models\shop\families\contracts\IFamily;
use app\models\shop\images\contracts\IImage;
use app\models\shop\images\contracts\WeImages;
use app\models\shop\images\decorators\CachedImage;
use app\models\shop\images\Image;
use app\models\shop\images\ImageSQL;
use app\tables\TableFamiliesImages;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\fields\Field;
use yii\web\UploadedFile;

class WithImages implements IFamily, WeImages
{
    private $origin;

    /**
     * FamilyWithImages constructor.
     * @param IFamily $family
     */
    public function __construct(IFamily $family)
    {
        $this->origin = $family;
    }

    public function remove(): void
    {
        $this->origin->remove();
        foreach ($this->imagesList() as $image) {
            $image->remove();
        }
    }

    /**
     * @param IForm $contentForm
     * @return IFamily
     */
    public function changeContent(IForm $contentForm): IFamily
    {
        $this->origin->changeContent($contentForm);
        return $this;
    }

    public function printYourSelf(): array
    {
        $imagesSelf = [];
        foreach ($this->imagesList() as $image) {
            $imagesSelf[] = $image->printYourSelf();
        }
        return array_merge(
            $this->origin->printYourSelf(),
            [
                'images' => $imagesSelf
            ]
        );
    }

    public function addImages(IForm $imagesForm): WeImages
    {
        $fields = $imagesForm->validatedFields();
        $images = [];
        foreach ($fields['images'] as $imageOnServer) {
            $images[] = $this->uploadedImage($imageOnServer);
        }
        return $this;
    }

    /**
     * @return IImage[]
     */
    public function imagesList(): array
    {
        $records = TableFamiliesImages::find()
            ->where([
                'family_id' => $this->origin->printYourSelf()['id']
            ])
            ->select('id')
            ->all();
        $list = [];
        foreach ($records as $record) {
            $list[] = $this->image($record);
        }
        return $list;
    }

    private function uploadedImage(UploadedFile $imageOnServer): IImage
    {
        $path = '';
        $imageOnServer->saveAs($path);
        $record = new TableFamiliesImages([
            'path' => $path
        ]);
        if ($record->save()) {
            return $this->image($record);
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    private function image(TableFamiliesImages $record): IImage
    {
        return
            new CachedImage(
                new ImageSQL(
                    new Field('id', $record->id)
                ),
                $record
            );
    }
}