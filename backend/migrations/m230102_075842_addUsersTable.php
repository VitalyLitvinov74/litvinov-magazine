<?php

use yii\db\Migration;

/**
 * Class m230102_075842_addUsersTable
 */
class m230102_075842_addUsersTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id'=>$this->primaryKey(),
            'accessToken'=> $this->string(),
            'passwordHash'=>$this->string(),
            'login'=>$this->string(),
            'createdAt'=>$this->dateTime(),
            'updatedAt'=>$this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230102_075842_addUsersTable cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230102_075842_addUsersTable cannot be reverted.\n";

        return false;
    }
    */
}
