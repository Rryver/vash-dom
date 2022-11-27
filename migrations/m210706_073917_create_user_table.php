<?php

use yii\db\Migration;
use app\models\User;

/**
 * Handles the creation of table `user`.
 */
class m210706_073917_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%user}}',
            [
                'id' => $this->primaryKey(11),
                'username' => $this->string(255)->notNull(),
                'auth_key' => $this->string(32)->notNull(),
                'password_hash' => $this->string(255)->notNull(),
                'password_reset_token' => $this->string(255)->null()->defaultValue(null),
                'email' => $this->string(255)->notNull(),
                'status' => $this->smallInteger(6)->notNull()->defaultValue(10),
                'role' => $this->smallInteger(6)->notNull()->defaultValue(10),
                'created_at' => $this->integer(11)->notNull(),
                'updated_at' => $this->integer(11)->notNull(),
            ], $tableOptions
        );

        $this->createIndex('username', '{{%user}}', ['username'], true);
        $this->createIndex('email', '{{%user}}', ['email'], true);
        $this->createIndex('password_reset_token', '{{%user}}', ['password_reset_token'], true);

        $this->insert('{{%user}}', [
            'username' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash(123456),
            'email' => 'admin@admin.ru',
            'status' => User::STATUS_ACTIVE,
            'role' => USER::ROLE_ADMIN,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('username', '{{%user}}');
        $this->dropIndex('email', '{{%user}}');
        $this->dropIndex('password_reset_token', '{{%user}}');
        $this->dropTable('{{%user}}');
    }
}
