<?php

class m180816_155119_vacations extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('vacations', [
            'id' => 'INT PRIMARY KEY AUTO_INCREMENT',
            'vacation_type_id' => 'INT(10) NOT NULL',
            'user_id' => 'INT(10) NOT NULL',
            'organisation_id' => 'INT(10) NOT NULL',
            'start_date' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'end_date' => 'DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'task_name' => 'VARCHAR(128) NOT NULL',
            'description' => 'TEXT DEFAULT NULL',
            'file_src' => 'VARCHAR(256) DEFAULT NULL',
            // 'position' => 'INT UNIQUE',
            'CONSTRAINT `FK_vacations_vacation_type` FOREIGN KEY (`vacation_type_id`) REFERENCES `vacation_type` (`id`)',
        ], "COLLATE='utf8_general_ci' ENGINE=InnoDB;");
	}

	public function safeDown()
	{
        $this->dropTable('vacations');
	}
}