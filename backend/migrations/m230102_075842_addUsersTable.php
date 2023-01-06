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
            'id' => $this->primaryKey(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);

        $this->createTable('accounts', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'password_hash' => $this->string(),
            'login' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);

        $this->createTable('auth_identity', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'account_id' => $this->integer(),
            'access_token' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('auth_identity');
        $this->dropTable('users');
        $this->dropTable('accounts');
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
