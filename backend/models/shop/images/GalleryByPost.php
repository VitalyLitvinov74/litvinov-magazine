<?php
namespace app\models\shop\images;


use app\models\forms\ImagesForm;
use app\models\shop\images\contracts\IGallery;
use app\models\shop\images\contracts\IImage;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\Field;
use yii\web\UploadedFile;

class GalleryByPost implements IGallery
{
    private $_addedImages  = [];
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
        foreach ($images as $image){
            /**@var UploadedFile $image*/
            $list[] = new Image(
                new Field(
                    'path',
                    $image->tempName//исправить на полный путь
                )
            );
        }
        return array_merge($list, $this->_addedImages);
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
     * @param array $images
     * @return IGallery
     */
    public function addImages(array $images): IGallery
    {
        $this->_addedImages = array_merge($this->_addedImages, $images);
        return $this;
    }
}