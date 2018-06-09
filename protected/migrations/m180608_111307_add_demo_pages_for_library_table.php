<?php

class m180608_111307_add_demo_pages_for_library_table extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('library', 'paper_price', 'DECIMAL(8,2) DEFAULT NULL');
        $this->addColumn('library', 'demo_link', 'VARCHAR(255) DEFAULT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('library', 'paper_price');
        $this->dropColumn('library', 'demo_link');
    }
}