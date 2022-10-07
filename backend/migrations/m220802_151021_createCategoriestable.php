<?php

use app\tables\TableCategories;
use yii\db\Migration;

/**
 * Class m220802_151020_addPrimeryKeyToCharacteristicsTable
 */
class m220802_151021_createCategoriestable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
        $record = new TableCategories(['name'=>"Главная"]);
        $record->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('categories');
    }
}
