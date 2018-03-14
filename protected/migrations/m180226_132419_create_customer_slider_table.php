<?php

class m180226_132419_create_customer_slider_table extends CDbMigration
{
	public function safeUp()
	{
	    $this->createTable('partner_carousel',array(
	        'id'=> 'INT NOT NULL PRIMARY KEY AUTO_INCREMENT',
            'link' => 'VARCHAR(50)',
            'order'=>'INT(11)',
            'text_ua' => 'TEXT',
            'text_ru' => 'TEXT',
            'text_en' => 'TEXT'
        ));
	}

	public function safeDown()
	{
	    $this->droptable('partner_carousel');
		return true;
	}

}