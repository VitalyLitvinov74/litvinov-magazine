<?php


namespace app\models\contracts;


interface IMedia extends IPrinter
{
    /**
     * @param string $key
     * @param        $value
     * и добавляет новое значение в список
     * @return $this
     */
    public function add(string $key, $value): self;

    /**
     * фиксирует изменения
     * @return $this
     */
    public function commit(): self;
}