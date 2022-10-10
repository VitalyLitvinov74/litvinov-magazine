<?php


namespace app\algorithms\trees\structs;


class NodeOfTree
{
    private $parentId;
    private $id;
    private $level;

    public function __construct(int $parentId, int $id, int $level)
    {
        $this->level = $level;
        $this->parentId = $parentId;
        $this->id = $id;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function parentId(): int
    {
        return $this->parentId;
    }

    public function level(): int
    {
        return $this->level;
    }
}