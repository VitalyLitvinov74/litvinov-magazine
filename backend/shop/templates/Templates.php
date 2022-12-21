<?php
declare(strict_types=1);

namespace app\shop\templates;

use app\shop\templates\contracts\WeTemplates;
use app\tables\TableTemplates;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\fields\Field;
use yii\db\ActiveRecord;
use yii\db\Query;

class Templates implements WeTemplates
{

    public function remove(IField $id): void
    {
        TableTemplates::deleteAll(['id' => $id->asInt()]);
    }

    public function add(IForm $templateForm): TableTemplates
    {
        $fields = $templateForm->validatedFields();
        $record = new TableTemplates($fields);
        if ($record->save()) {
            return $record;
        }
        throw new NotSavedData($record->getErrors(), 400);
    }

    public function findOne(Query $query): TableTemplates
    {
        $record = $query->one();
        if ($record) {
            return $record;
        }
        throw new NotFoundEntity('Не уадлось найти nuxt шаблон');
    }

    /**
     * @return TableTemplates[]
     */
    public function findAll(Query $query): array
    {
        return $query->all();
    }
}