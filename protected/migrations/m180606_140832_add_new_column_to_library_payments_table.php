<?php

class m180606_140832_add_new_column_to_library_payments_table extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('library_payments', 'payment_id', 'INT DEFAULT NULL');
        $this->addColumn('library_payments', 'sender_phone', 'VARCHAR(255) DEFAULT NULL');
        $this->addColumn('library_payments', 'sender_card_mask2', 'VARCHAR(255) DEFAULT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('library_payments', 'sender_card_mask2');
        $this->dropColumn('library_payments', 'sender_phone');
        $this->dropColumn('library_payments', 'payment_id');
    }
}