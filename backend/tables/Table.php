<?php


namespace app\tables;


use app\models\contracts\IMedia;
use app\models\contracts\IPrinter;
use app\models\media\ArrayMedia;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsTrait;
use vloop\entities\exceptions\NotSavedData;
use yii\base\Arrayable;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;
use yii\helpers\VarDumper;

abstract class Table extends ActiveRecord
{
    private $afterSaveFields = [];

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
        $newData = [];
        foreach ($data as $key => $value) {
            $newKey = Inflector::camel2id($key, '_');
            $newData[$newKey] = $value;
            if ($this->hasAttribute($newKey)) {
                $this->setAttribute($newKey, $value);
            }
        }
        if ($this->hasMethod('loadRelations')) {
            $this->loadRelations($newData);
        }
        return $loaded;
    }

    public function afterSave($insert, $changedAttributes)
    {
        foreach ($this->relatedRecords as $name => $relations) {
            if (is_array($relations)) {
                foreach ($this->$name as $relation) {
                    $relation->refresh();
                }
            }else{
                $this->$name->refresh();
            }
        }
        parent::afterSave($insert, $changedAttributes);
    }

    public function fields()
    {
        return array_merge(parent::fields(), $this->afterSaveFields);
    }
}