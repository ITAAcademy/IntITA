<?php

class m180816_143930_vacation_type extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('vacation_type', [
            'id' => 'INT PRIMARY KEY AUTO_INCREMENT',
            'title_ua' => 'VARCHAR(128) NOT NULL',
            'title_ru' => 'VARCHAR(128) NOT NULL',
            'title_en' => 'VARCHAR(128) NOT NULL',
            'position' => 'INT UNIQUE',
        ]);
        $this->insertMultiple('vacation_type', [
            [
                'title_ua' => 'Відпустка за рахунок організації',
                'title_ru' => 'Отпуск за счет организации',
                'title_en' => 'Vacation at the expense of the organization',
                'position' => 1,
            ],
            [
                'title_ua' => 'Відпустка за власний рахунок',
                'title_ru' => 'Отпуск за свой счет',
                'title_en' => 'Vacation at one`s own expense',
                'position' => 2,
            ],
            [
                'title_ua' => 'Лікарняний по догляду за дитиною',
                'title_ru' => 'Больничный по уходу за ребёнком',
                'title_en' => 'Сhildcare sick leave',
                'position' => 3,
            ],
            [
                'title_ua' => 'Лікарняний (особистий)',
                'title_ru' => 'Больничный (личный)',
                'title_en' => 'Sick leave (One`s own)',
                'position' => 4,
            ],
            [
                'title_ua' => 'Відрядження',
                'title_ru' => 'Командировка',
                'title_en' => 'Business trip',
                'position' => 5,
            ],
            [
                'title_ua' => 'Понаднормова робота',
                'title_ru' => 'Сверхурочная работа',
                'title_en' => 'Overtime work',
                'position' => 6,
            ],
            [
                'title_ua' => 'Бонуси',
                'title_ru' => 'Бонусы',
                'title_en' => 'Benefits',
                'position' => 7,
            ],
        ]);
	}

	public function safeDown()
	{
        $this->dropTable('vacation_type');
	}
}