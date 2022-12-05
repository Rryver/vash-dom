<?php

use yii\db\Migration;

/**
 * Class m221205_133640_add_column_into_promo_table
 */
class m221205_133640_add_column_into_promo_table extends Migration
{
    public $tableName = '{{%promo}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'tag', $this->string()->after('image'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->tableName, 'tag');
    }
}
