<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%step}}`.
 */
class m221201_194755_create_step_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%step}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'description' => $this->string(),
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
        $this->dropTable('{{%step}}');
    }
}
