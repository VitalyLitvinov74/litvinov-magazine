<?php


namespace app\models\forms;


use app\shop\contracts\CharacteristicFormInterface;
use yii\base\Model;

class CharacteristicForm extends Model implements CharacteristicFormInterface
{
    public string $name;
    public string $value;

    public function rules(): array
    {
        return [
            [['value', 'name'], 'required']
        ];
    }
}