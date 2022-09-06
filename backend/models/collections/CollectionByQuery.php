<?php
namespace app\models\collections;


use app\models\contracts\IMedia;
use app\models\contracts\IPrinter;
use app\models\contracts\ITrash;
use app\models\media\ArrayMedia;
use app\models\media\JsonMedia;
use app\tables\Table;
use vloop\entities\contracts\IField;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\helpers\VarDumper;

class CollectionByQuery extends CollectionByRecord
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
        foreach ($this->list() as $key=>$item){
            /**@var Table $item*/
            //айтем печатает себя в массив. затем добавляем этот массив в наш медиа.
            $media->add(
                $key,
                $item->printTo(new ArrayMedia()));
        }
        return $media;
    }
}