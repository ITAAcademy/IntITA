<?php

class m180814_062102_alter_library_table extends CDbMigration
{
	public function safeUp()
	{
		$this->alterColumn('library', 'title', 'VARCHAR(512)');
        $this->alterColumn('library', 'description', 'VARCHAR(1512)');
		$this->addColumn('library', 'publication_year', 'INT DEFAULT NULL');
		$this->addColumn('library', 'position', 'INT UNIQUE');
		foreach (Library::model()->findAll() as $lib){
            $this->update('library', array('position' => $lib->id), 'id='.$lib->id);
        }
	}

	public function safeDown()
	{
		$this->dropColumn('library', 'position');
        $this->dropColumn('library', 'publication_year');
	}
}