<?php

namespace app\models\shop\images;


use app\models\forms\ImagesForm;
use app\models\shop\images\contracts\IGallery;
use app\models\shop\images\contracts\IImage;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\FileNotFound;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\Field;
use Yii;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

class PostGallery implements IGallery
{
    private $_addedImages = [];
    private $form;

    /**
     * GalleryByPost constructor.
     * @param IForm|ImagesForm $form
     */
    public function __construct(IForm $form)
    {
        $this->form = $form;
    }

    /**
     * @return IImage[]
     * @throws NotValidatedFields
     */
    public function list(): array
    {
        $list = [];
        $images = $this->form->validatedFields()['images'];
        foreach ($images as $image) {
            /**@var UploadedFile $image */
            $runtimeImagePath =
                $this->runtimeImagesDir() . '/' . uniqid() . '.' . $image->extension;
            if($image->saveAs($runtimeImagePath)){
                $list[] = new Image(
                    new Field(
                        'path',
                        $runtimeImagePath
                    )
                );
            }else{
                VarDumper::dump($image->error);die;
            }

        }
        return array_merge($list, $this->_addedImages);
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
     */
    public function mergeGalleries(IGallery $needleMerge): IGallery
    {
        $this->_addedImages = array_merge(
            $this->_addedImages,
            $needleMerge->list()
        );
        return $this;
    }

    private function runtimeImagesDir(): string
    {
        $dir = Yii::getAlias('@runtime/images');
        if (!is_dir($dir)) {
            // Полный доступ для владельца, доступ на чтение и выполнение для других
            $old_umask = umask(0);
            mkdir($dir, 0775, true);
            umask($old_umask);
        }
        return $dir;
    }
}