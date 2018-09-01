<?php

class m180802_182310_migrate_schemas_requests extends CDbMigration
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
    echo "m180802_182310_migrate_schemas_requests was going down.\n";
    $this->delete('requests','type = 8');
    return true;
   }

  private function prepareRequests()
   {
    return \Yii::app()->db->createCommand("
            SELECT 8 as request_type, 
             mr.id_receiver as request_user,
             mssr.id_service as request_model_id,
             mssr.status as action,
             mssr.date_create as action_date,
             mssr.date_checked as check_date,
             mssr.user_checked as action_user,
             mssr.id_schema_template as comment
             from messages_service_schemes_request mssr 
             left join message_receiver mr on mssr.id_message = mr.id_message
   ")->queryAll();
   }
}