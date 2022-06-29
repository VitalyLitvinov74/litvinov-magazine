<?php


namespace app\tables;


use app\models\trash\IMedia;
use vloop\entities\exceptions\NotSavedData;
use yii\db\ActiveRecord;

class Table extends ActiveRecord implements IMedia
{
    /**
     * @param string $key
     * @param        $value
     * @return $this
     */
    public function add(string $key, $value): IMedia
    {
        $this->setAttribute($key, $value);
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
            return $this;
        }
        throw new NotSavedData($this->getErrors(), 422);
    }
}