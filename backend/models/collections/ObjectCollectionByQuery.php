<?php
namespace app\models\collections;


use app\models\contracts\IMedia;
use app\models\contracts\IPrinter;
use app\models\media\JsonMedia;
use vloop\entities\contracts\IField;
use yii\db\ActiveRecord;
use yii\db\Query;

class ObjectCollectionByQuery extends CollectionByRecord
{
    private $_exampleOfCreate;
    private $query;

    public function __construct(Query $query, callable $exampleOfCreate)
    {
        $this->_exampleOfCreate = $exampleOfCreate;
        $this->query = $query;
    }

    /**
     * @return mixed - вернет пример объект который нужно превратить в коллекцию
     */
    protected function exampleOfCreate()
    {
        return $this->_exampleOfCreate;
    }

    protected function records(): array
    {
        $paramsList = $this->query->params;
        foreach ($paramsList as $paramKey => $param){
            if($param instanceof IField){
                $paramsList[$paramKey] = $param->value();
            }
        }
        $this->query->params = $paramsList;
        return $this->query->all();
    }

    public function list()
    {
        return parent::list();
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        $medias = [];
        foreach ($this->list() as $item){
            /**@var IPrinter $item*/
            $medias[] =  $item->printTo(new JsonMedia())->toArray();
        }
        $media->add('type', $medias);
        return $media;
    }
}