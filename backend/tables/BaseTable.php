<?php


namespace app\tables;


use app\models\contracts\IMedia;
use app\models\contracts\IPrinter;
use app\models\media\ArrayMedia;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsTrait;
use vloop\entities\exceptions\NotSavedData;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;
use yii\helpers\VarDumper;

abstract class BaseTable extends ActiveRecord
{
    use SaveRelationsTrait;

    public function behaviors()
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

    public function load($data, $formName = '')
    {
        $loaded = parent::load($data, $formName);
        if ($loaded && $this->hasMethod('loadRelations')) {
            $this->loadRelations($data);
        }
        return $loaded;
    }

    public function fields()
    {
        $merged =  array_merge(
            parent::fields(),
            static::extraFields()
        );
        foreach ($merged as $key=>$name){
            unset($merged[$key]);
            $merged[Inflector::variablize($key)]=$name;
        }
        return $merged;
    }

    public function setAttributes($values, $safeOnly = false)
    {
        $valuesWithNewKeys = [];
        foreach ($values as $name => $value) {
            $name = Inflector::camel2id($name, '_');
            $valuesWithNewKeys[$name] = $value;
        }
        parent::setAttributes($valuesWithNewKeys, $safeOnly);
    }

    public static function find()
    {
        return new BaseQuery(static::class);
    }
}