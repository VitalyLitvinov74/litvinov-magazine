<?php
declare(strict_types=1);

namespace app\shop\contracts;

use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use yii\db\ActiveRecord;
use yii\db\Query;

interface IList
{
    public function add(IForm $form): ActiveRecord;

    public function remove(IField $id): void;

    public function findOne(Query $query): ActiveRecord;

    /**
     * @return ActiveRecord[]
     */
    public function findAll(Query $query): array;
}