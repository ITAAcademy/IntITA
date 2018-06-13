<?php

class m180607_092407_add_text_for_banners_in_graduates extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('banners_for_graduates', 'text', 'VARCHAR(255) DEFAULT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('banners_for_graduates','text');
        return true;
    }
}