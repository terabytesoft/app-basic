<?php

use yii\db\Migration;

/**
 * m000000_000002_create_user_tests_table is the migrations Web Application Basic.
 */
class m000000_000002_create_user_tests_table extends Migration
{
    // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
    private $_tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('user_test', [
			'id' =>$this->primaryKey(),
			'username' =>$this->string()->notNull()->unique(),
			'auth_key' =>$this->string(32)->notNull(),
			'password_hash' =>$this->string()->notNull(),
			'password_reset_token' =>$this->string()->unique(),
            'email' =>$this->string()->notNull()->unique(),
            'role' =>$this->smallInteger()->notNull()->defaultValue(10),
			'status' =>$this->smallInteger()->notNull()->defaultValue(10),
			'created_at' =>$this->integer()->notNull(),
			'updated_at' =>$this->integer()->notNull(),
        ], ($this->db->driverName === 'mysql') ? $this->_tableOptions : '');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('user_test');
    }
}
