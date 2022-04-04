<?php


namespace app\models\shop\images;


use app\models\shop\images\contracts\IImage;
use vloop\entities\contracts\IField;
use vloop\entities\exceptions\FileNotFound;

class Image implements IImage
{
    private $path;

    /**
     * Image constructor.
     * @param IField $path - абсолютный путь до файла
     */
    public function __construct(IField $path)
    {
        $this->path = $path;
    }

    public function printYourSelf(): array
    {
        return pathinfo($this->path->value());
    }

    /**
     * @throws FileNotFound
     */
    public function moveToTrash(): void
    {
        if (is_file($this->path->value())) {
            unlink($this->path->value());
            return;
        }
        throw new FileNotFound('Не удалось удалить файл, поскольку он отсутствует', 'image');
    }
}