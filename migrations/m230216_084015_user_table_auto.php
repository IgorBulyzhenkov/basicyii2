<?php

use yii\db\Migration;

/**
 * Class m230216_084015_user_table_auto
 */
class m230216_084015_user_table_auto extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{auto}}',[
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'user_name' => $this->string()->notNull(),
            'type_car' => $this->string()->notNull(),
            'car_brand' => $this->string()->notNull(),
            'car_model' => $this->string()->notNull(),
            'run' => $this->string()->notNull(),
            'region' => $this->string()->notNull(),
            'date' => $this->string()->notNull(),
            'year' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'img' => $this->string()->notNull(),
            'price' => $this->string()->notNull(),
            'name_img' => $this->string()->notNull(),
        ]);

    }

    public function down()
    {
        echo "m230216_084015_user_table_auto cannot be reverted.\n";

        return false;
    }
}
