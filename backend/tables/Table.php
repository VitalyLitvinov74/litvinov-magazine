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

abstract class Table extends ActiveRecord implements IMedia
{
    protected $addedProperty = [];

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

    /**
     * @param string $key
     * @param        $value
     * @param bool   $keyIsList
     * @return $this
     */
    public function add(string $key, $value, bool $keyIsList = false): IMedia
    {
        $key = Inflector::camel2id($key, '_');
        if ($this->hasAttribute($key)) {
            $this->setAttribute($key, $value);
        } else {
            if ($keyIsList) {
                $this->addedProperty[$key][] = $value;
            } else {
                $this->addedProperty[$key] = $value;
            }
        }
        return $this;
    }

    /**
     * фиксирует изменения
     * @return $this
     * @throws NotSavedData
     */
    public function commit(): IMedia
    {
        if ($this->save()) {
            if ($this->hasAttribute('id')) {
                $this->add('id', $this->id);
            }
            return $this;
        }
        throw new NotSavedData($this->getErrors(), 422);
    }

    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        $this->load($this->addedProperty, '');
        return $insert;
    }

    public function printTo(IMedia $media): IMedia
    {
        foreach ($this->attributes as $attributeName => $attributeVal) {
            $media->add($attributeName, $attributeVal);
        }
        if (!empty($this->addedProperty)) {
            foreach ($this->addedProperty as $property => $value) {
                if (is_array($value)) {
                    $media->add($property, $value, true);
                } else {
                    $media->add($property, $value);
                }
            }
        }
        return $media;
    }
}