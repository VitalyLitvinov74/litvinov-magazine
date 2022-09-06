<?php


namespace app\models\media;


use app\models\contracts\ITrash;

class RelationForRemove implements ITrash
{
    private $parent;
    private $childs;

    /**
     * RelationForRemove constructor.
     * @param ITrash $parent
     * @param ITrash[]  $childs
     */
    public function __construct(ITrash $parent, array $childs)
    {
        $this->childs = $childs;
        $this->parent = $parent;
    }

    /**
     * Переносит объект в корзину
     */
    public function moveToTrash(): void
    {
        foreach ($this->childs as $child){
            $child->moveToTrash();
        }
        $this->parent->moveToTrash();
    }
}