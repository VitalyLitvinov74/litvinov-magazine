<?php


namespace app\tables;


use app\models\contracts\IMedia;
use app\models\contracts\IPrinter;
use vloop\entities\exceptions\NotSavedData;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;

class Table extends ActiveRecord implements IMedia
{
    /**
     * @param string $key
     * @param        $value
     * @return $this
     */
    public function add(string $key, $value): IMedia
    {
        $key = Inflector::camel2id($key, '_');
        if($this->hasAttribute($key)){
            $this->setAttribute($key, $value);
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
        if($this->save()){
            if($this->hasAttribute('id')){
                $this->add('id', $this->id);
            }
            return $this;
        }
        throw new NotSavedData($this->getErrors(), 422);
    }

    public function printTo(IMedia $media): IMedia
    {
        foreach ($this->attributes as $attributeName=> $attributeVal) {
            $media->add($attributeName, $attributeVal);
        }
        return $media;
    }
}