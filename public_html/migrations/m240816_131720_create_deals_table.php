<?php

use yii\db\Migration;

class m240816_131720_create_deals_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('deals', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'amount' => $this->decimal(10, 2)->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('deals');
    }
}
