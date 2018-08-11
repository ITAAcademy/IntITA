<?php

class m180514_122404_create_table_liqpay extends CDbMigration
{
    public function safeUp()
    {
        $this->createTable('liqpay', [
            'id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT',
            'public_key' => 'VARCHAR(255) NOT NULL',
            'private_key' => 'VARCHAR(255) NOT NULL',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('liqpay');
    }
}