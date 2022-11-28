<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%message_promo}}`.
 */
class m221128_143814_create_message_promo_table extends Migration
{
    public $tableName = '{{%message_promo}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'message' => $this->text(),
            'isNew' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'promo_id' => $this->integer(),
            'promo_name_when_created_at' => $this->string(),
            'created_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
        ]);

        $this->addForeignKey(
            'FK-message_promo-promo_id-promo-id',
            $this->tableName,
            'promo_id',
            '{{%promo}}',
            'id',
            'SET NULL',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
