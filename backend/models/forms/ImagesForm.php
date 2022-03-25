<?php


namespace app\models\forms;


use vloop\entities\contracts\IForm;
use vloop\entities\yii2\AbstractForm;

class ImagesForm extends AbstractForm
{
    private $origin;

    public function __construct(IForm $origin, $method = 'post', $config = [])
    {
        $this->origin = $origin;
        parent::__construct($method, $config);
    }

    public function validatedFields(): array
    {
        return array_merge(
            parent::validatedFields(),
            $this->origin->validatedFields()
        );
    }

    public $images;

    public function rules()
    {
        return [
            ['images', 'required'],
            ['images', 'file', 'maxFiles' => 6]
        ];
    }
}