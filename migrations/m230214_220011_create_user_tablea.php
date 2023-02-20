<?php

use yii\db\Migration;

/**
 * Class m230214_220011_create_user_tablea
 */
class m230214_220011_create_user_tablea extends Migration
{

    public function up()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'status' => $this->integer()->defaultValue(1)
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
