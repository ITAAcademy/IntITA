`<?php

class m180328_114934_update_cms_footer_table extends CDbMigration
{
    public function safeUp()
    {
        $this->alterColumn('cms_general_settings', 'twitter', 'VARCHAR(255) NULL DEFAULT NULL');
        $this->alterColumn('cms_general_settings', 'youtube', 'VARCHAR(255) NULL DEFAULT NULL');
        $this->alterColumn('cms_general_settings', 'google', 'VARCHAR(255) NULL DEFAULT NULL');
        $this->alterColumn('cms_general_settings', 'facebook', 'VARCHAR(255) NULL DEFAULT NULL');
        $this->alterColumn('cms_general_settings', 'linkedin', 'VARCHAR(255) NULL DEFAULT NULL');
        $this->alterColumn('cms_general_settings', 'instagram', 'VARCHAR(255) NULL DEFAULT NULL');
    }

    public function safeDown()
    {
        $this->alterColumn('cms_general_settings', 'twitter', 'VARCHAR(255) NOT NULL');
        $this->alterColumn('cms_general_settings', 'youtube', 'VARCHAR(255) NOT NULL');
        $this->alterColumn('cms_general_settings', 'google', 'VARCHAR(255) NOT NULL');
        $this->alterColumn('cms_general_settings', 'facebook', 'VARCHAR(255) NOT NULL');
        $this->alterColumn('cms_general_settings', 'linkedin', 'VARCHAR(255) NOT NULL');
        $this->alterColumn('cms_general_settings', 'instagram', 'VARCHAR(255) NOT NULL');

    }
}