<?php

class m180516_124934_create_library_payments_table extends CDbMigration
{
    public function safeUp()
    {
        $this->createTable('library_payments', [
            'id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT',
            'order_id' => 'VARCHAR(128) NOT NULL',
            'library_id' => 'INT(10) NOT NULL',
            'user_id' => 'INT(10) NOT NULL',
            'amount' => 'DECIMAL(10,2) NOT NULL DEFAULT "0.00"',
            'status' => 'BOOLEAN NOT NULL DEFAULT FALSE',
            'date' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ]);

        $this->addForeignKey('FK_library_payments_library', 'library_payments', 'library_id', 'library', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('FK_library_payments_user', 'library_payments', 'user_id', 'user', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function safeDown()
    {
        $this->dropTable('library_payments');
    }
}