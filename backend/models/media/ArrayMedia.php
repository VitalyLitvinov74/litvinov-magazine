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
     * @param        $value
     * и добавляет новое значение в список
     * @return $this
     */
    public function add(string $key, $value): IMedia
    {
        $this->list[$key] = $value;
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
        // TODO: Implement fields() method.
    }

    /**
     * @inheritDoc
     */
    public function extraFields()
    {
        // TODO: Implement extraFields() method.
    }

    /**
     * @inheritDoc
     */
    public function toArray(array $fields = [], array $expand = [], $recursive = true)
    {
        // TODO: Implement toArray() method.
    }
}