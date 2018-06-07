<?php

class m180604_130128_banners_for_graduates extends CDbMigration
{
    public function safeUp()
    {
        $this->createTable('banners_for_graduates', [
            'id' => 'INT PRIMARY KEY AUTO_INCREMENT',
            'file_path' => 'VARCHAR(255) NOT NULL',
            'slide_position' => 'INT(10) DEFAULT 0',
            'visible' => 'TINYINT(50) NOT NULL DEFAULT 0'
        ]);
        $this->createIndex('IDX_FILEPATH','banners_for_graduates','file_path');
    }

    public function safeDown()
    {
        echo "m171225_174000_banners_for_graduates was giong down.\n";
        $this->dropIndex('IDX_FILEPATH','banners_for_graduates');
        $this->dropTable('banners_for_graduates');
        return true;
    }
}