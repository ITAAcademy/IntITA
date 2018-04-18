<?php

class m180404_152336_update_cms_footer_table extends CDbMigration
{
    public function safeUp()
    {
        $this->alterColumn('cms_general_settings', 'mobile_phone', 'VARCHAR(50) NULL DEFAULT NULL');
        $this->alterColumn('cms_general_settings', 'mobile_phone_2', 'VARCHAR(50) NULL DEFAULT NULL');

    }

    public function safeDown()
    {
        $this->alterColumn('cms_general_settings', 'mobile_phone', 'VARCHAR(15) NULL DEFAULT NULL');
        $this->alterColumn('cms_general_settings', 'mobile_phone_2', 'VARCHAR(15) NULL DEFAULT NULL');

    }
}