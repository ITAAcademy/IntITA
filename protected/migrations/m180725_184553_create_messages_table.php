<?php

class m180725_184553_create_messages_table extends CDbMigration
{
	public function safeUp()
	{
  $this->createTable('intita_messages', [
      'id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT',
      'type' => 'INT(3) NOT NULL',
      'create_date' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
      'sender' => 'INT(10) DEFAULT 0',
      'receiver' => 'INT(10) NOT NULL',
      'subject' => 'VARCHAR(255) DEFAULT NULL',
      'message_text' => 'TEXT DEFAULT NULL',
      'read_date' => 'TIMESTAMP NULL DEFAULT NULL',
      'delete_date' => 'TIMESTAMP NULL DEFAULT NULL',
      'parent_id' => 'INT(10) NOT NULL DEFAULT 0'
  ]);
  $this->createIndex('IDX_messages_type','intita_messages','type');
  $this->createIndex('IDX_messages_create_date','intita_messages','create_date');
  $this->createIndex('IDX_messages_read_date','intita_messages','read_date');
  $this->createIndex('IDX_messages_delete_date','intita_messages','delete_date');
  $this->createIndex('IDX_messages_sender','intita_messages','sender');
  $this->createIndex('IDX_messages_parent_message','intita_messages','parent_id');
  $this->addForeignKey('FK_messages_user', 'intita_messages', 'receiver', 'user', 'id', 'RESTRICT', 'RESTRICT');

 }

	public function safeDown()
	{
	echo "m180725_184553_create_messages_table does was going down.\n";
	$this->dropIndex('IDX_messages_type','intita_messages');
	$this->dropIndex('IDX_messages_create_date','intita_messages');
	$this->dropIndex('IDX_messages_read_date','intita_messages');
	$this->dropIndex('IDX_messages_delete_date','intita_messages');
	$this->dropIndex('IDX_messages_sender','intita_messages');
	$this->dropIndex('IDX_messages_parent_message','intita_messages');
	$this->dropForeignKey('FK_messages_user', 'intita_messages');
	$this->dropTable('intita_messages');
		return true;
	}
}