<?php

class m200104_080322_alter_column_checking_account extends CDbMigration
{
	public function up()
	{
        $this->alterColumn('acc_checking_accounts', 'checking_account', 'varchar(32) NOT NULL');
	}

	public function down()
	{
		$this->alterColumn('acc_checking_accounts', 'checking_account', 'bigint NOT NULL');
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