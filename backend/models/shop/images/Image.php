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
    private $path;

    /**
     * Image constructor.
     * @param IField $path - путь до файла.
     */
    public function __construct(IField $path)
    {
        $this->path = $path;
    }

    /**
     * @return array
     */
    public function printYourSelf(): array
    {
        return array_merge(
            pathinfo($this->path->value()),
            ['path'=>$this->path->value()]
        );
    }

    /**
     * @throws FileNotFound
     */
    public function moveToTrash(): void
    {
        if(file_exists($this->path->value())){
            unlink($this->path->value());
        }
        throw new FileNotFound('Не удалось найти изображение, чтобы его удалить');
    }
}