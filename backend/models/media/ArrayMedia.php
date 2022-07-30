<?php


namespace app\models\media;


use app\models\contracts\IMedia;
use Iterator;
use JsonSerializable;
use yii\base\Arrayable;

class ArrayMedia implements IMedia, Arrayable
{
    private $list;

    public function __construct(array $started = [])
    {
        $this->list = $started;
    }

    /**
     * @param string $key
     * @param mixed       $value
     * и добавляет новое значение в список
     * @param bool $keyIsList
     * @return $this
     */
    public function add(string $key, $value, bool $keyIsList = false): IMedia
    {
        if($keyIsList){
            $this->list[$key][] = $value;
        }else{
            $this->list[$key] = $value;
        }
        return $this;
    }

    /**
     * фиксирует изменения
     * @return $this
     */
    public function commit(): IMedia
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function fields()
    {
        return $this->list;
    }

    /**
     * @inheritDoc
     */
    public function extraFields()
    {
        return $this->list;
    }

    /**
     * @inheritDoc
     */
    public function toArray(array $fields = [], array $expand = [], $recursive = true)
    {
        return $this->list;
    }
}