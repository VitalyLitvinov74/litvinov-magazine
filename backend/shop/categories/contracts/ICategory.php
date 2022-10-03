<?php


namespace app\shop\categories\contracts;


interface ICategory
{
    public function buildTree(int $parentId): void;
}