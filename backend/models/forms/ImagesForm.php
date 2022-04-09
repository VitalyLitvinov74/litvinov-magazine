<?php


namespace app\models\forms;


use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\yii2\AbstractForm;
use yii\base\Model;
use yii\web\UploadedFile;

class ImagesForm extends AbstractForm
{
    public $images;

    public function rules()
    {
        return [
            [['images'], 'file', 'maxFiles' => 6]
        ];
    }

    /**
     * @return array - проверенные поля в формате ключ=>значение
     * @throws NotValidatedFields
     */
    public function validatedFields(): array
    {
        $this->images = UploadedFile::getInstancesByName('images');
        return parent::validatedFields();
    }
}