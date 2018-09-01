<?php

class m180819_104748_add_about_and_faq_to_general_settings extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('cms_general_settings', 'about_us', 'TEXT NULL DEFAULT NULL');
        $this->addColumn('cms_general_settings', 'faq', 'TEXT NULL DEFAULT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('cms_general_settings', 'about_us');
        $this->dropColumn('cms_general_settings', 'faq');
    }
}