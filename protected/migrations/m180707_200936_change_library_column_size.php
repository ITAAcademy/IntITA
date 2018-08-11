<?php

class m180707_200936_change_library_column_size extends CDbMigration
{
    public function safeUp()
    {
        $this->alterColumn('library', 'title', 'VARCHAR(256)');
        $this->alterColumn('library', 'description', 'VARCHAR(512)');
    }

    public function safeDown()
    {
        return true;
    }
}