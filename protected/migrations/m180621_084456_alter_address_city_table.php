<?php

class m180621_084456_alter_address_city_table extends CDbMigration
{
	public function safeUp()
	{
        $this->addColumn('address_city', 'checked', 'BOOLEAN NOT NULL DEFAULT TRUE');
	}

	public function safeDown()
	{
        $this->dropColumn('address_city', 'checked');
	}
}