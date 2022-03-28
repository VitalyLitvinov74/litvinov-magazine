<?php


namespace app\models\queries;


use yii\db\ActiveRecord;

interface ICache
{
    /**
     * @return mixed - возвращает результат кеширования в ОП.
     */
    public function value();

    /**
     * Очищает кеш.
     */
    public function clean(): void;
}