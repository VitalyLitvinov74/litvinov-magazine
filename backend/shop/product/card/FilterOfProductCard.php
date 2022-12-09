<?php
declare(strict_types=1);

namespace app\shop\product\card;

use app\shop\contracts\IFilter;
use app\tables\TableProductCard;
use yii\db\ActiveQuery;
use yii\db\Query;

class FilterOfProductCard implements IFilter
{

    public function query(): Query
    {
        return new ActiveQuery(TableProductCard::class);
    }
}