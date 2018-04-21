<?php

class m180420_105539_add_role_api_key_manager extends CDbMigration
{
	public function up()
	{
	    $this->createTable('user_api_key_manager',[
            'id_user' => 'INT(10) NOT NULL',
            'start_date' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'end_date' => 'DATETIME NULL DEFAULT NULL',
            'assigned_by' => 'INT(10) NOT NULL',
            'cancelled_by' => 'INT(10) DEFAULT NULL',
            'CONSTRAINT `FK_user_api_key_manager` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)'
        ]);
	}

	public function down()
	{
        $this->dropForeignKey('FK_user_api_key_manager', 'user_api_key_manager');
        $this->dropTable('user_api_key_manager');
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