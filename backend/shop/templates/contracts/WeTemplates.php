<?php
declare(strict_types=1);

namespace app\shop\templates\contracts;

use app\shop\contracts\IList;
use app\tables\TableTemplates;
use vloop\entities\contracts\IForm;
use yii\db\ActiveRecord;
use yii\db\Query;

interface WeTemplates extends IList
{
    public function add(IForm $templateForm): TableTemplates;

    public function findOne(Query $query): TableTemplates;

    /**
     * @return ActiveRecord[]
     */
    public function findAll(Query $query): array;
}