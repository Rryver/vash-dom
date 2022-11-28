<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%promo}}`.
 */
class m221128_143527_create_promo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%promo}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->string(1024),
            'visible' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'show_in_slider' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'sort' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%promo}}');
    }
}
