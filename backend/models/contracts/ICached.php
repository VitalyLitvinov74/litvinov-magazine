<?php


namespace app\models\contracts;


use yii\db\ActiveRecord;

interface ICached
{
    /**
     * @param ActiveRecord[] $records
     * @return $this
     */
    public function addToCache(array $records): self;
}