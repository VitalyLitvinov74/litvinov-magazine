<?php


namespace app\models\media;


use app\models\contracts\ITrash;

class RelationForRemove implements ITrash
{
    private $parent;
    private $child;

    public function __construct(ITrash $parent, ITrash $child)
    {
        $this->child = $child;
        $this->parent = $parent;
    }

    /**
     * Переносит объект в корзину
     */
    public function moveToTrash(): void
    {
        $this->child->moveToTrash();
        $this->parent->moveToTrash();
    }
}