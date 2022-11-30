<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%main_slide}}`.
 */
class m221130_194429_create_main_slide_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%main_slide}}', [
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
        $this->dropTable('{{%main_slide}}');
    }
}
