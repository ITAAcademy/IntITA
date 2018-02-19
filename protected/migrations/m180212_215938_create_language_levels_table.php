<?php

class m180212_215938_create_language_levels_table extends CDbMigration
{
	public function safeUp()
    {
        $this->createTable('language_levels', [
            'id' => 'INT PRIMARY KEY AUTO_INCREMENT',
            'title' => 'VARCHAR(50) NOT NULL',
            'description' => 'VARCHAR(50) NOT NULL',
            'order' => 'INT(5) NOT NULL',
        ]);

        $this->insertMultiple('language_levels', [
            [
                'title' => 'A1',
                'description' => 'Elementary',
                'order' => '1',
            ],
            [
                'title' => 'A2',
                'description' => 'Pre-Intermidiate',
                'order' => '2',
            ],
            [
                'title' => 'B1',
                'description' => 'Intermidiate',
                'order' => '3',
            ],
            [
                'title' => 'B2',
                'description' => 'Upper-Intermidiate',
                'order' => '4',
            ],
            [
                'title' => 'C1',
                'description' => 'Advanced',
                'order' => '5',
            ],
            [
                'title' => 'C2',
                'description' => 'Proficiency',
                'order' => '6',
            ],
        ]);
    }
	public function safeDown()
	{
		//echo "m180212_215938_create_language_levels_table does not support migration down.\n";
		//return false;
        $this->dropTable('language_levels');
	}

    //
	/* Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}