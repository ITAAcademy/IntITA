<?php

class m180307_133629_create_cms_menu_list extends CDbMigration
{
    public function safeUp() {
        $this->createTable('cms_menu_list', [
            'id' => 'INT PRIMARY KEY AUTO_INCREMENT',
            'title' => 'VARCHAR(32) NOT NULL',
            'link' => 'VARCHAR(255) NOT NULL',
            'image' => 'VARCHAR(255) DEFAULT NULL',
            'description' => 'TEXT DEFAULT NULL',
            'id_organization' => 'INT(10) NOT NULL',
        ]);

        $this->addForeignKey('FK_cms_menu_list_organization','cms_menu_list','id_organization','organization','id', 'RESTRICT', 'RESTRICT');
    }

    public function safeDown() {
        $this->dropForeignKey('FK_cms_menu_list_organization','cms_menu_list');

        $this->dropTable('cms_menu_list');
    }
}