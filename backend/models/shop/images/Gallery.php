<?php


namespace app\models\shop\images;


use app\models\shop\images\contracts\IGallery;
use app\models\shop\images\contracts\IImage;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\Field;
use yii\helpers\FileHelper;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

class Gallery implements IGallery
{
    private $_folder;

    public function __construct(IField $folder)
    {
        $this->_folder = $folder;
    }

    /**
     * @return IImage[]
     */
    public function list(): array
    {
        $list = [];
        foreach ($this->files() as $file){
            $list[] = $this->image($file);
        }
        return $list;
    }

    public function printYourSelf(): array
    {
        $self = [];
        foreach ($this->list() as $image){
            $self[] = $image->printYourSelf();
        }
        return $self;
    }

    /**
     * @param IForm $imagesForm
     * @return IImage[]
     * @throws NotSavedData
     * @throws NotValidatedFields
     */
    public function addImages(IForm $imagesForm): array
    {
        $added = [];
        $fields = $imagesForm->validatedFields();
        foreach ($fields['images'] as $uploadedImage){
            /**@var UploadedFile $uploadedImage*/
            $saved = $uploadedImage->saveAs(
                $imagesPath = $this->newImagePath($uploadedImage->extension)
            );
            if($saved){
                $added[] = $this->image($imagesPath);
            }else{
                throw new NotSavedData([$uploadedImage->error], 422);
            }
        }
        return $added;
    }

    /**
     * @return string[] - список абсолютных путей до файлов в текущем каталоге
     *
     */
    private function files(): array{

        return FileHelper::findFiles($this->folder());
    }

    private function image(string $path): IImage{
        return new Image(
            new Field('path', $path)
        );
    }

    /**
     * @return string - абсолютный путь до папки с изображениями (без слеша в конце)
     */
    private function folder(): string{
        $dir = $this->_folder->value();
        if(!is_dir($dir)){
            mkdir($dir, 0775, true);
        }
        return $dir;
    }

    private function newImagePath(string $extension){
        return $this->folder() . '/' . microtime() . '.' . $extension;
    }
}