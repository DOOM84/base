<?php

use yii\db\Migration;

/**
 * Handles the creation for table `post`.
 */
class m160824_153132_create_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'post' => $this->text(),
            'user_id' => $this->integer()
        ]);
      $this->addForeignKey('post_user_id', 'post', 'user_id', 'user', 'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('post');
    }
}
