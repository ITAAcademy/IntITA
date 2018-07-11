<?php

class m180706_124003_create_vacation_types extends CDbMigration
{
	public function up()
	{
        $this->createTable('vacation_types', array(
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'title_ua' => 'VARCHAR(64) NOT NULL',
            'title_ru' => 'VARCHAR(64) NOT NULL',
            'title_en' => 'VARCHAR(64) NOT NULL',
        ));
	}

	public function down()
	{
        $this->dropTable('vacation_types');
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