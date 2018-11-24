<?php

class m180802_181544_migrate_revision_requests extends CDbMigration
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
    echo "m180802_181544_migrate_revision_requests was going down.\n";
    $this->delete('requests','type = 4');
    return true;
   }

  private function prepareRequests()
   {
    return \Yii::app()->db->createCommand("
                SELECT 4 as type,
         mr.id_receiver as request_user,
         mrr.id_revision as request_model_id,
         (
         CASE
          WHEN mrr.date_approved IS NOT NULL THEN 2
          ELSE 1
         END
         )as action,
         (
         CASE
          WHEN mrr.date_approved IS NOT NULL THEN mrr.date_approved
          ELSE mrr.date_rejected
         END
         )as action_date,
         (
         CASE
          WHEN mrr.user_approved IS NOT NULL THEN mrr.user_approved
          ELSE mrr.user_rejected
         END
         )as action_user,
         mrj.comment
         from messages_revision_request mrr
         left join message_receiver mr on mrr.id_message = mr.id_message
         left join messages_reject_revision mrj ON mrj.id_revision = mrr.id_revision 
         group by mr.id_message 
         HAVING action_user IS NOT NULL
   ")->queryAll();
   }
}