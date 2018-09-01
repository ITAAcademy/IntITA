<?php

class m180802_181737_migrate_payment_requests extends CDbMigration
{
  public function safeUp()
   {
    $requests = $this->prepareRequests();
    $requests = array_chunk($requests,500);
    foreach ($requests as $request)
     $this->insertMultiple('requests',$request);
   }

  public function safeDown()
   {
    echo "m180802_181737_migrate_payment_requests was going down.\n";
    $this->delete('requests','type = 5');
    return true;
   }

  private function prepareRequests()
   {
    return \Yii::app()->db->createCommand("
             SELECT 
             5 as type,
             mr.id_receiver as request_user,
             mp.service_id as request_model_id,
             mp.operation_id as action,
             '2016-04-01 00:00:00' as action_date,
             mr.id_receiver as action_user
             from messages_payment mp 
             left join message_receiver mr on mp.id_message = mr.id_message
             group by mr.id_message 
   ")->queryAll();
   }
}