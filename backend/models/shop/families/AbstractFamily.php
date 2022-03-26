<?php


namespace app\models\shop\families;


use app\models\shop\families\contracts\IFamily;
use app\tables\TableFamilies;

abstract class AbstractFamily implements IFamily
{
    abstract protected function record(): TableFamilies;

    public function printYourSelf(): array
    {
        $record = $this->record();
        $record->refresh();
        return [
            'id' => $record->id,
            'title' => $record->title,
            'description' => $record->desc,
            'shortDescription' => $record->short_desc
        ];
    }
}