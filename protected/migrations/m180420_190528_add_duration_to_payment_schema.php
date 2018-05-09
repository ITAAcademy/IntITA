<?php

class m180420_190528_add_duration_to_payment_schema extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('acc_payment_schema_template', 'duration', 'INT(2) DEFAULT 12');
        $this->update('acc_payment_schema_template',['duration'=>12]);
        $this->addColumn('acc_payment_schema_template', 'start_date', 'DATE DEFAULT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('acc_payment_schema_template', 'duration');
        $this->dropColumn('acc_payment_schema_template', 'start_date');
    }
}