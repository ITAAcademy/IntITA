<?php

class m180315_133649_add_column_tbl_library extends CDbMigration
{
	public function up()
	{
	    $this->addColumn('library','author','text');
	}

	public function down()
	{
        $this->dropColumn('library', 'author');
	}
}