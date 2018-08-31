<?php

class m180802_182134_migrate_agrements_requests extends CDbMigration
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
    echo "m180802_182134_migrate_agrements_requests was going down.\n";
    $this->delete('requests','type = 7');
    return true;
   }

  private function prepareRequests()
   {
    return \Yii::app()->db->createCommand("
            SELECT 7 as type,
             mr.id_receiver as request_user,
             mwar.id_agreement as request_model_id,
             (
             CASE
              WHEN mwar.status = 0 THEN 1
              WHEN mwar.status = 1 THEN 2
              ELSE 0
             END
             ) as action,
             mwar.date_create as action_date,
             mwar.date_checked as check_date,
             mwar.user_checked as action_user,
             (
             CASE
              WHEN mwar.status = 0 THEN mwar.reject_comment
              WHEN mwar.status = 1 THEN mwar.`comment`
             END
             ) as comment	
             from messages_written_agreements_request mwar 
             left join message_receiver mr on mwar.id_message = mr.id_message
             group by mr.id_message
   ")->queryAll();
   }
}