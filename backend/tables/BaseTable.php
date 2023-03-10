<?php

namespace app\tables;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsTrait;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;

abstract class BaseTable extends ActiveRecord
{
    use SaveRelationsTrait;

    public function behaviors(): array
    {
        return
            array_merge(
                parent::behaviors(),
                [
                    'saveRelations' => [
                        'class' => SaveRelationsBehavior::class,
                        'relationKeyName' => SaveRelationsBehavior::RELATION_KEY_RELATION_NAME
                    ]
                ]
            );
    }

    public function load($data, $formName = ''): bool
    {
        $loaded = parent::load($data, $formName);
        if ($loaded && $this->hasMethod('loadRelations')) {
            $this->loadRelations($data);
        }
        return $loaded;
    }

    /**
     * преобразует поля таблицы в camelCase
     * @return array
     */
    public function fields(): array
    {
        $fields = parent::fields();
        foreach ($fields as $key => $name) {
            unset($fields[$key]);
            $fields[Inflector::variablize($key)] = $name;
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