<?php


namespace app\shop\categories\contracts;


use vloop\entities\contracts\IField;

interface ICategory
{
    /**
     * @param IField $parentId
     */
    public function buildTree(IField $parentId): self;


}