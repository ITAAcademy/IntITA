<?php

class m180502_192624_add_imap_server_param extends CDbMigration
{
  public function safeUp()
   {
    $this->insert('config', array(
        'param' => 'imapServerAddress',
        'value' => 'mail.itatests.com:993',
        'default' => 'mail.intita.com:993',
        'label' => 'Адреса та порт imap серверу для отримання кількості нових повідомлень',
        'type' => 'string'
    ));
   }

  public function safeDown()
   {
    echo "m180111_153419_add_git_script_path goes down.\n";
    $this->delete('config',"param='imapServerAddress'");
    return true;
   }
}