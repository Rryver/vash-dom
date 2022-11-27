<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kitchen}}`.
 */
class m220323_175821_create_kitchen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kitchen}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'image' => $this->string(),
            'sort' => $this->integer()->unsigned()->defaultValue(0),
            'visible' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'created_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
