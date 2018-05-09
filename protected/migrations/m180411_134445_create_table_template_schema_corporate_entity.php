<?php

class m180411_134445_create_table_template_schema_corporate_entity extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('acc_payment_schema_template', 'id_checking_account', 'INT(11) DEFAULT NULL');

        $this->addForeignKey('FK_acc_payment_schema_template_checking_account', 'acc_payment_schema_template', 'id_checking_account', 'acc_checking_accounts', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function safeDown()
    {
        $this->dropForeignKey('FK_acc_payment_schema_template_checking_account', 'acc_payment_schema_template');

        $this->dropColumn('acc_payment_schema_template', 'id_checking_account');
    }
}