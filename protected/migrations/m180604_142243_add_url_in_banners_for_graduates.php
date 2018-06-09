<?php

class m180604_142243_add_url_in_banners_for_graduates extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('banners_for_graduates', 'url', 'VARCHAR(255) DEFAULT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('banners_for_graduates','url');
        return true;
    }
}