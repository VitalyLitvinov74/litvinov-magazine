<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%cart}}`.
 */
class m230114_173047_addCountColumnToCarttable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('carts_via_equipment', 'count', $this->integer()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('carts_via_equipment', 'count');
    }
}
