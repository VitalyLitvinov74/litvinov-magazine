<?php


namespace app\models\queries;


use vloop\entities\contracts\IField;
use vloop\entities\yii2\queries\IImprovedQuery;
use yii\db\Query;

class QueryByField implements IImprovedQuery
{
    private $field;
    private $origin;

    public function __construct(IField $field, IImprovedQuery $origin)
    {
        $this->field = $field;
        $this->origin = $origin;
    }

    /**
     * @return Query - возвращает улучшенный запрос, который можно конструировать из объектов.
     */
    public function queryOfSearch(): Query
    {
        $query = $this->origin->queryOfSearch();
        $query->andWhere($this->field->printYourSelf());
        return $query;
    }
}