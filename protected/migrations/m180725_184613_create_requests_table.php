<?php

class m180725_184613_create_requests_table extends CDbMigration
{
	public function safeUp()
	{
  $this->createTable('requests', [
      'id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT',
      'type' => 'INT(3) NOT NULL',
      'request_user' => 'INT(10) NOT NULL',
      'request_model_id' => 'INT NOT NULL',
      'action' => 'INT(2) DEFAULT 0',
      'action_date' => 'TIMESTAMP NULL DEFAULT NULL',
      'check_date' => 'TIMESTAMP NULL DEFAULT NULL',
      'action_user' => 'INT(10) DEFAULT 0',
      'comment' => 'VARCHAR(255) DEFAULT NULL',
      'deleted' => 'TINYINT DEFAULT 0',
      'organization' => 'INT(10) DEFAULT 0',
  ]);
  $this->createIndex('IDX_requests_type','requests','type');
  $this->createIndex('IDX_requests_user','requests','request_user');
  $this->createIndex('IDX_requests_model_id','requests','request_model_id');
  $this->createIndex('IDX_action','requests','action');
  $this->createIndex('IDX_action_date','requests','action_date');
  $this->createIndex('IDX_action_check_date','requests','check_date');
  $this->createIndex('IDX_action_user','requests','action_user');
  $this->createIndex('IDX_organization','requests','organization');

 }

	public function safeDown()
	{
	echo "m180725_184613_create_requests_table does was going down.\n";
	 $this->dropIndex('IDX_requests_type','requests');
	 $this->dropIndex('IDX_requests_user','requests');
	 $this->dropIndex('IDX_requests_model_id','requests');
	 $this->dropIndex('IDX_action','requests');
	 $this->dropIndex('IDX_action_date','requests');
	 $this->dropIndex('IDX_action_check_date','requests');
	 $this->dropIndex('IDX_action_user','requests');
	 $this->dropIndex('IDX_organization','requests');
	 $this->dropTable('requests');
		return true;
	}
}