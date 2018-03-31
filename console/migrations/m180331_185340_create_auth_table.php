<?php

use yii\db\Migration;

/**
 * Handles the creation of table `auth`.
 */
class m180331_185340_create_auth_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('auth', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('auth');
    }
}
