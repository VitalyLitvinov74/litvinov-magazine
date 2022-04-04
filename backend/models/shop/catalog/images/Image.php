<?php


namespace app\models\shop\images;


use app\models\shop\images\contracts\IImage;
use app\tables\TableImages;
use vloop\entities\contracts\IField;
use vloop\entities\exceptions\FileNotFound;
use vloop\entities\exceptions\NotFoundEntity;
use yii\db\StaleObjectException;

class Image implements IImage
{
    private $id;

    /**
     * Image constructor.
     * @param IField $imageId
     */
    public function __construct(IField $imageId)
    {
        $this->id = $imageId;
    }

    /**
     * @return array
     * @throws NotFoundEntity
     */
    public function printYourSelf(): array
    {
        $record = $this->record();
        return array_merge(
            ['id' => $record->id],
            pathinfo($record->path)
        );
    }

    /**
     * @throws FileNotFound
     * @throws NotFoundEntity
     * @throws StaleObjectException
     */
    public function moveToTrash(): void
    {
        $record = $this->record();
        if (is_file($record->path)) {
            unlink($record->path);
            $record->delete();
            return;
        }
        throw new FileNotFound('Не удалось удалить файл, поскольку он отсутствует', 'image');
    }

    /**
     * @return TableImages
     * @throws NotFoundEntity
     */
    private function record(): TableImages
    {
        $record = TableImages::find()->where([
            'id' => $this->id->value()
        ])->one();
        if ($record) {
            return $record;
        }
        throw new NotFoundEntity('Не удалось найти изображение с id=' . $this->id->value());
    }
}