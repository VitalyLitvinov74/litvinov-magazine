<?php


namespace app\models\fields;


use vloop\entities\contracts\IField;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\yii2\queries\IImprovedQuery;
use yii\helpers\VarDumper;

class FieldLastId implements IField
{
    private $query;
    private $key;
    private $type;

    public function __construct(IImprovedQuery $query, string $type = '', string $key = 'id')
    {
        $this->query = $query;
        $this->key = $key;
        $this->type = $type;
    }

    /**
     * @return array - печатает само себя
     * @throws NotFoundEntity
     */
    public function printYourSelf(): array
    {
        return [
            $this->key => $this->value()
        ];
    }

    /**
     * @return string - возвращает значение поля
     * @throws NotFoundEntity
     */
    public function value(): string
    {
        $query = $this->query->queryOfSearch();
        $id = $query->select('id')
            ->orderBy('id DESC')
            ->scalar();
        if($id !== false){
            return $id;
        }
        throw  new NotFoundEntity('Не удалось найти последнюю запись ' . $this->type );
    }
}