<?php

class m180223_115446_create_library_table extends CDbMigration
{
	public function safeUp()
	{
	    $this->createTable('library',[
            'id' => 'INT PRIMARY KEY AUTO_INCREMENT',
            'title' => 'VARCHAR(50) NOT NULL',
            'description' => 'VARCHAR(256) NOT NULL',
            'price' => 'DECIMAL(8,2) NOT NULL',
            'language' => 'VARCHAR(50) NOT NULL',
            'status' => 'VARCHAR(50) NOT NULL',
            'link' => 'VARCHAR(256) NOT NULL',
            'logo' => 'VARCHAR(256) NOT NULL',
        ]);
	}

	public function safeDown()
	{
        $this->dropTable('library');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}