<?php


namespace app\models\trash;


interface IMedia
{
    /**
     * @param string $key
     * @param        $value
     * @return $this
     */
    public function add(string $key, $value): self;

    /**
     * фиксирует изменения
     * @return $this
     */
    public function commit(): self;
}