<?php


namespace app\models\media;


use app\models\collections\ICollection;
use app\models\contracts\IMedia;
use app\models\contracts\IPrinter;

class RelationForPrint implements IPrinter, IMedia
{
    private $child;
    private $parent;
    private $added;
    private $childType;

    public function __construct(IPrinter $parent, IPrinter $child, string $childType = '')
    {
        $this->child = $child;
        $this->parent = $parent;
        $this->childType = $childType;
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        $this->parent->printTo($media);
        $this->child->printTo($media);
        return $media;
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