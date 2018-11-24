<?php

class m180909_172055_add_lost_fk_on_messages extends CDbMigration
{

	public function safeUp()
	{
  $this->addForeignKey('FK_messages_user_sender', 'intita_messages', 'sender', 'user', 'id', 'RESTRICT', 'RESTRICT');

 }

	public function safeDown()
	{
  echo "m180909_172055_add_lost_fk_on_messages does not support migration down.\n";
  $this->dropForeignKey('FK_messages_user_sender', 'intita_messages');
  return true;
 }

}