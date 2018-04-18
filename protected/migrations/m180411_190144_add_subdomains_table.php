<?php

 class m180411_190144_add_subdomains_table extends CDbMigration
  {

   public function safeUp()
    {
     $this->createTable('subdomains', [
         'id'           => 'INT PRIMARY KEY AUTO_INCREMENT',
         'domain_name'  => 'VARCHAR(255) NOT NULL',
         'organization' => 'INT(10) DEFAULT 0',
         'active'       => 'TINYINT(50) NOT NULL DEFAULT 0'
     ]);
     $this->createIndex('IDX_DOMAIN', 'subdomains', 'domain_name', true);
     $this->createIndex('IDX_ORGANIZATION', 'subdomains', 'organization');
    }

   public function safeDown()
    {
     echo "m180411_190144_add_subdomains_table does not support migration down.\n";
     $this->dropIndex('IDX_DOMAIN', 'subdomains');
     $this->dropIndex('IDX_ORGANIZATION', 'subdomains');
     $this->dropTable('subdomains');

     return true;
    }

  }