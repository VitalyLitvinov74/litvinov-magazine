<?php


namespace app\models\contracts;


interface IMedia extends IPrinter
{
    /**
     * @param string $key
     * @param        $value
     * @param bool $keyIsList - если список, то не перезаписывает значение, а делает из этого значения список,
     * и добавляет новое значение в список.
     * @return $this
     */
    public function add(string $key, $value, bool $keyIsList = false): self;

    /**
     * фиксирует изменения
     * @return $this
     */
    public function commit(): self;

    /**
     * @return array
     */
    public function toArray();
}