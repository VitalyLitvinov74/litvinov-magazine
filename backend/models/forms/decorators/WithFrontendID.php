<?php

namespace app\models\forms\decorators;

use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\yii2\AbstractForm;

class WithFrontendID  implements IForm
{
    private $origin;
    public $frontendId;

    public function __construct(AbstractForm $origin)
    {
        $this->origin = $origin;
    }

    public function rules(){
        return array_merge(
            $this->origin->rules(),
            [
                [['frontendId'],'int'],
                ['frontendId', 'require']
            ]
        );
    }

    /**
     * @return array - проверенные поля в формате ключ=>значение
     * @throws NotValidatedFields
     */
    public function validatedFields(): array
    {

        return $this->origin->validatedFields();
    }
}