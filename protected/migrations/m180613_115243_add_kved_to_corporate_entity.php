<?php

class m180613_115243_add_kved_to_corporate_entity extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('acc_corporate_entity', 'kved', 'VARCHAR(255) DEFAULT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('acc_corporate_entity', 'kved');
    }
}