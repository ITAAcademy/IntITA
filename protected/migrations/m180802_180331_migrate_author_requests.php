<?php

class m180802_180331_migrate_author_requests extends CDbMigration
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
  echo "m180802_180331_migrate_author_requests was going down.\n";
  $this->delete('requests','type = 1');
	 return true;
	}

  private function prepareRequests(){
   return \Yii::app()->db->createCommand("
               SELECT 1 as type, 
            mr.id_receiver as request_user,
            m.id_module as request_model_id,
            (CASE 
             when m.date_approved is null then 1
             else 2	
            END) as action,
            (
            CASE 
             when m.date_approved is null then NULL
             else m.date_approved	
            END) as action_date,
            m.id_teacher as action_user
            from messages_author_request m 
            left join message_receiver mr on m.id_message = mr.id_message
            where mr.id_receiver IS NOT NULL   
   ")->queryAll();
  }
}