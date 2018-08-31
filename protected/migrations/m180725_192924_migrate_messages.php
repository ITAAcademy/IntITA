<?php

class m180725_192924_migrate_messages extends CDbMigration
{
	public function up()
	{
	 $notificationMessages = $this->prepareNotificationMessages();
	 $userMessages = $this->prepareUserMessages();
	 $notificationMessages = array_chunk($notificationMessages,500);
  $userMessages = array_chunk($userMessages,500);
  foreach ($notificationMessages as $message)
    $this->insertMultiple('intita_messages',$message);
  foreach ($userMessages as $message)
   $this->insertMultiple('intita_messages',$message);

 }

	public function down()
	{
		echo "m180725_192924_migrate_messages does not support migration down.\n";
		$this->delete('intita_messages');
		return true;
	}

  private function prepareNotificationMessages(){
	  return \Yii::app()->db->createCommand('SELECT m.id, 2 as type, m.create_date, m.sender, r.id_receiver as receiver, mn.subject, mn.text as message_text, r.read as read_date, r.deleted as delete_date
FROM message_receiver r
LEFT JOIN messages m ON r.id_message = m.id  
LEFT JOIN messages_notifications mn ON mn.id_message = m.id
WHERE m.type = 9 
GROUP BY  m.id')->queryAll();

  }

  private function prepareUserMessages(){
   return \Yii::app()->db->createCommand('SELECT m.id, 1 as type, m.create_date, m.sender, r.id_receiver as receiver, mn.subject, mn.text as message_text, r.read as read_date, r.deleted as delete_date, mr.id_message as parent_id
FROM message_receiver r
LEFT JOIN messages m ON r.id_message = m.id  
LEFT JOIN user_messages mn ON mn.id_message = m.id
LEFT JOIN messages_reply mr ON mr.reply = m.id
WHERE m.type = 1 
GROUP BY  m.id')->queryAll();

  }


}