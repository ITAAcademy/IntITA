<?php

class m180718_140044_change_lp_status_column extends CDbMigration
{
    public function safeUp()
    {
        $this->alterColumn('library_payments', 'status', 'VARCHAR(64)');
    }

    public function safeDown()
    {
        $this->alterColumn('library_payments', 'status', 'BOOLEAN NOT NULL DEFAULT FALSE');
    }
}