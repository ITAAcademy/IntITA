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

        ]);
    }
	public function safeDown()
	{
        $this->dropTable('language_levels');
	}
}