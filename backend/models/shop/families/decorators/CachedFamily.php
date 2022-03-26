<?php


namespace app\models\shop\families\decorators;


use app\models\queries\ICache;
use app\models\shop\families\AbstractFamily;
use app\models\shop\families\contracts\IFamily;
use app\tables\TableFamilies;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;

class CachedFamily extends AbstractFamily implements IFamily
{
    private $cache;
    private $origin;

    public function __construct(IFamily $origin, ICache $cache)
    {
        $this->cache = $cache;
        $this->origin = $origin;
    }

    public function remove(): void
    {

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
        return parent::printYourSelf();
    }

    protected function record(): TableFamilies
    {
        /**@var TableFamilies $record*/
        $record = $this->cache->value();
        if($record){
            return $record;
        }
        throw new NotFoundEntity("Не удалось найти продукт");
    }
}