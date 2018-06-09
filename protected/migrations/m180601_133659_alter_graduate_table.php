<?php

class m180601_133659_alter_graduate_table extends CDbMigration
{
	public function safeUp()
	{
        $this->alterColumn('graduate', 'last_name_ru', 'string DEFAULT NULL');
        $this->alterColumn('graduate', 'first_name_ru', 'string DEFAULT NULL');

        $this->update('graduate', array('last_name_ru' => null), 'last_name_ru=:value', array(':value'=>'не указано'));
		$this->update('graduate', array('first_name_ru' => null), 'first_name_ru=:value', array(':value'=>'не указано'));
	}

	public function safeDown()
	{
		$this->update('graduate', array('last_name_ru' => 'не указано'), 'last_name_ru=:value', array(':value'=>null));
		$this->update('graduate', array('first_name_ru' => 'не указано'), 'first_name_ru=:value', array(':value'=>null));

		$this->alterColumn('graduate', 'last_name_ru', 'string NOT NULL');
        $this->alterColumn('graduate', 'first_name_ru', 'string NOT NULL');
	}
}
