<?php

class m180309_154441_create_cms_news_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->createTable('cms_news', [
            'id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT',
            'title' => 'VARCHAR(255) NOT NULL',
            'text' => 'TEXT NOT NULL',
            'date' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'img' => 'VARCHAR(128) NOT NULL',
            'id_organization' => 'INT(10) NOT NULL',
        ]);

        $this->addForeignKey('FK_cms_news_organization','cms_news','id_organization','organization','id');
	}

	public function safeDown()
	{
        $this->dropForeignKey('FK_cms_news_organization','cms_news');
        $this->dropTable('cms_news');
	}

}