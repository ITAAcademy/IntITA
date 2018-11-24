<?php

class m180802_181925_migrate_teacher_consultant_requests extends CDbMigration
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
    echo "m180802_181925_migrate_teacher_consultant_requests was going down.\n";
    $this->delete('requests','type = 6');
    return true;
   }

  private function prepareRequests()
   {
    return \Yii::app()->db->createCommand("
             SELECT 6 as type,
              mr.id_receiver as request_user,
              mtcr.id_teacher as request_model_id,
              (CASE
               WHEN mtcr.date_approved IS NOT NULL THEN 2
               ELSE 1
              END
              )as action,
              (
              CASE
               WHEN mtcr.date_approved IS NOT NULL THEN mtcr.date_approved
               ELSE '2016-04-01 00:00:00'
              END
              )as action_date,
              (
              CASE
               WHEN mtcr.user_approved IS NOT NULL THEN mtcr.user_approved
               ELSE 38
              END
              )as action_user,
              mtcr.id_module as comment
              from messages_teacher_consultant_request mtcr 
              left join message_receiver mr on mtcr.id_message = mr.id_message
              group by mr.id_message 
              HAVING request_user IS NOT NULL
   ")->queryAll();
   }
}