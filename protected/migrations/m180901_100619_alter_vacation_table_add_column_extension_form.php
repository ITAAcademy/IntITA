<?php

class m180901_100619_alter_vacation_table_add_column_extension_form extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('vacation_type', 'extension_form', 'BOOLEAN NOT NULL DEFAULT false');
        $this->update('vacation_type', array('extension_form' => true), 'id=:value', array(':value'=>6));
        $this->update('vacation_type', array('extension_form' => true), 'id=:value', array(':value'=>7));
	}

	public function safeDown()
	{
		$this->dropColumn('vacation_type', 'extension_form');
	}
	
}