<?php

use yii\db\Migration;

/**
 * Class m180420_073352_alter_table_post_add_column_complants
 */
class m180420_073352_alter_table_post_add_column_complants extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%post}}', 'complaints', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%post}}', 'complaints', $this->integer());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180420_073352_alter_table_post_add_column_complants cannot be reverted.\n";

        return false;
    }
    */
}
