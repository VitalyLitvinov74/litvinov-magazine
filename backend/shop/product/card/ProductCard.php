<?php

namespace app\shop\product\card;

use app\models\fields\IField;
use app\shop\product\card\contracts\IProductCard;
use app\tables\TableProductCard;
use vloop\entities\exceptions\NotFoundEntity;
use yii\db\Exception;

class ProductCard implements IProductCard
{
    static function byId(IField $id): self
    {
        $record = TableProductCard::find()->where(['id' => $id->asInt()])->one();
        if ($record) {
            return new self($record);
        }
        throw new NotFoundEntity('Карточка продукта с id=' . $id->asInt() . ' не найдена');
    }

    private $record;

    public function __construct(TableProductCard $cardRecord)
    {
        $this->record = $cardRecord;
    }

    public function __get($name)
    {
        if ($this->record->hasAttribute($name)) {
            return $this->record->getAttribute($name);
        }
        if ($this->record->getRelation($name, false)) {
            return $this->record->$name;
        }
        throw new Exception('Не существует такого атрибута');
    }

    public function asArray(): array
    {
        return $this->record->toArray();
    }
}