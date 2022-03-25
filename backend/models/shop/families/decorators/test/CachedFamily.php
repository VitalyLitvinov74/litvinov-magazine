<?php


namespace app\models\shop\families\decorators\test;


use app\models\contracts\ICached;
use app\models\shop\families\contracts\IFamily;
use vloop\entities\contracts\IForm;
use yii\db\ActiveRecord;

class CachedFamily implements ICached, IFamily
{
    

    public function __construct(IFamily $origin)
    {
    }

    /**
     * @param ActiveRecord[] $records
     * @return $this
     */
    public function addToCache(array $records): ICached
    {
        // TODO: Implement addToCache() method.
    }

    public function remove(): void
    {
        // TODO: Implement remove() method.
    }

    /**
     * @param IForm $contentForm
     * @return IFamily
     */
    public function changeContent(IForm $contentForm): IFamily
    {
        // TODO: Implement changeContent() method.
    }

    public function printYourSelf(): array
    {
        // TODO: Implement printYourSelf() method.
    }
}