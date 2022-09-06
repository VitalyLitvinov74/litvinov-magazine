<?php


namespace app\models\collections;


use app\models\contracts\ITrash;

abstract class AbstractCollection implements ICollection
{
    /**
     * @inheritDoc
     */
    public function moveToTrash(): void
    {
        foreach ($this->list() as $item){
            /**@var ITrash $item*/
            if($item instanceof ITrash){
                $item->moveToTrash();
            }
            unset($item);
        }
        $this->__destruct();
    }
    public function __destruct()
    {

    }
}