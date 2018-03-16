<?php

class m180303_154150_create_library_categoty_table extends CDbMigration
{
	public function up()
	{
	    $this->createTable('library_category',[
	        'id' =>  'INT PRIMARY KEY AUTO_INCREMENT',
            'title_ua' => 'VARCHAR(512) NOT NULL',
            'title_ru' => 'VARCHAR(512) NOT NULL',
            'title_en' => 'VARCHAR(512) NOT NULL',
        ]);
	}

	public function down()
	{
		$this->dropTable('library_category');
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