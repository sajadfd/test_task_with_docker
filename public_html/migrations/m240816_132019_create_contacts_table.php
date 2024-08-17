<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contacts}}`.
 */
class m240816_132019_create_contacts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contacts', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'deal_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex('idx-contacts-deal_id', 'contacts', 'deal_id');
        $this->addForeignKey(
            'fk-contacts-deal_id',
            'contacts',
            'deal_id',
            'deals',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-contacts-deal_id', 'contacts');
        $this->dropIndex('idx-contacts-deal_id', 'contacts');
        $this->dropTable('contacts');
    }
}
