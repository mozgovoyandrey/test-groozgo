<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m180106_091614_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'lastname' => $this->string(100)->notNull(),
            'firstname' => $this->string(100)->notNull(),
            'birthday' => $this->date()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
