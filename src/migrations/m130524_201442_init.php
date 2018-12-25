<?php

/**
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 *
 *        @link: https://github.com/terabytesoft/app-basic
 *      @author: Wilmer Arámbula <terabytesoftw@gmail.com>
 *   @copyright: (c) TERABYTE SOFTWARE SA
 *  @migrations: [m130524_201442_init]
 *       @since: 0.0.1
 *         @yii: 3.0
 **/

namespace app\basic\forms\migrations;

use yii\db\Migration;

class m130524_201442_init extends Migration
{
	public function up()
	{
		$tableOptions = null;

		if ($this->db->driverName === 'mysql') {
			// http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%user}}', [
			'id' => $this->primaryKey(),
			'username' => $this->string()->notNull()->unique(),
			'auth_key' => $this->string(32)->notNull(),
			'password_hash' => $this->string()->notNull(),
			'password_reset_token' => $this->string()->unique(),
			'email' => $this->string()->notNull()->unique(),
			'status' => $this->smallInteger()->notNull()->defaultValue(10),
			'created_at' => $this->integer()->notNull(),
			'updated_at' => $this->integer()->notNull(),
		], $tableOptions);
	}

	public function down()
	{
		$this->dropTable('{{%user}}');
	}
}
