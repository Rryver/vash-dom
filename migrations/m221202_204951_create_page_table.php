<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page}}`.
 */
class m221202_204951_create_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'slug' => $this->string()->notNull()->unique(),
            'content' => $this->text(),
            'visible' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'seo_title' => $this->string(),
            'seo_keywords' => $this->string(),
            'seo_description' => $this->string(),
            'created_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%page}}');
    }
}
