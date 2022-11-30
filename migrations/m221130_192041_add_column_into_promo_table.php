<?php

use yii\db\Migration;

/**
 * Class m221130_192041_add_column_into_promo_table
 */
class m221130_192041_add_column_into_promo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%promo}}', 'image', $this->string()->after('description'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%promo}}', 'image');
    }

}
