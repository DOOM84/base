<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user`.
 */
class m160824_144739_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'password' => $this->string(),
            'email' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
