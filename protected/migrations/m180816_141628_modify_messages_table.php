<?php

class m180816_141628_modify_messages_table extends CDbMigration
{
	public function safeUp()
	{
  $this->addColumn('intita_messages', 'sender_delete_date', 'VARCHAR(255) DEFAULT NULL');
  $this->renameColumn('intita_messages','delete_date','receiver_delete_date');
	}

	public function safeDown()
	{
		echo "m180816_141628_modify_messages_table does not support was going down.\n";
		$this->dropColumn('intita_messages', 'sender_delete_date');
  $this->renameColumn('intita_messages','receiver_delete_date','delete_date');
		return true;
	}

}