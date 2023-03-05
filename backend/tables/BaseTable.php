<?php
namespace app\tables;

use yii\db\ActiveRecord;
use yii\helpers\Inflector;

abstract class BaseTable extends ActiveRecord
{
    /**
     * преобразует поля таблицы в camelCase
     * @return array
     */
    public function fields(): array
    {
        $fields = parent::fields();
        foreach ($fields as $key=>$name){
            unset($fields[$key]);
            $fields[Inflector::variablize($key)]=$name;
        }
        return $fields;
    }

    /**
     * @param $values
     * @param $safeOnly
     * @return void - при загрузке полей преобразует их из camelCase в snake_case
     */
    public function setAttributes($values, $safeOnly = false): void
    {
        $valuesWithNewKeys = [];
        foreach ($values as $name => $value) {
            $name = Inflector::camel2id($name, '_');
            $valuesWithNewKeys[$name] = $value;
        }
        parent::setAttributes($valuesWithNewKeys, $safeOnly);
    }
}