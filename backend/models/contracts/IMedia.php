<?php


namespace app\models\contracts;


interface IMedia
{
    /**
     * @param string $key
     * @param        $value
     * и добавляет новое значение в список
     * @param bool   $keyIsList
     * @return $this
     */
    public function add(string $key, $value,  bool $keyIsList = false): self;

    /**
     * фиксирует изменения
     * @return $this
     */
    public function commit(): self;
}