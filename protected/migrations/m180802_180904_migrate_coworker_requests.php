<?php

class m180802_180904_migrate_coworker_requests extends CDbMigration
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
    echo "m180802_180904_migrate_coworker_requests was going down.\n";
    $this->delete('requests','type = 2');
    return true;
   }

  private function prepareRequests(){
   return \Yii::app()->db->createCommand("
                         SELECT 2 as type, 
          mr.id_receiver as request_user,
          mcr.id_teacher as request_model_id,
          (
          CASE
           WHEN mcr.cancelled = 0 THEN 1
           ELSE 2
          END
          ) as action,
           (
          CASE
           WHEN mcr.cancelled = 0 THEN mcr.date_approved
           ELSE '2016-04-01 00:00:00'
          END
          ) as action_date,
          (
          CASE
           WHEN mcr.user_approved IS NULL THEN 38
           ELSE mcr.user_approved
          END
          ) as action_user
          from messages_coworker_request mcr 
          left join message_receiver mr on mcr.id_message = mr.id_message 
          group by mr.id_message
   ")->queryAll();
  }
}