<?php

class m180421_182559_add_start_date_to_user_agreements_table extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('acc_user_agreements', 'start_date', 'DATE DEFAULT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('acc_user_agreements', 'start_date');
    }
}