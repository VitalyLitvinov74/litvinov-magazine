<?php


namespace app\models\media;


use app\models\collections\ICollection;
use app\models\contracts\IMedia;
use app\models\contracts\IPrinter;

class RelationToPrint implements IPrinter, IMedia
{
    private $child;
    private $parent;
    private $added;

    public function __construct(IPrinter $parent, IPrinter $child)
    {
        $this->child = $child;
        $this->parent = $parent;
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {

    }

    /**
     * @param string $key
     * @param        $value
     * и добавляет новое значение в список
     * @param bool   $keyIsList
     * @return $this
     */
    public function add(string $key, $value, bool $keyIsList = false): IMedia
    {
        // TODO: Implement add() method.
    }

    /**
     * фиксирует изменения
     * @return $this
     */
    public function commit(): IMedia
    {
        // TODO: Implement commit() method.
    }
}