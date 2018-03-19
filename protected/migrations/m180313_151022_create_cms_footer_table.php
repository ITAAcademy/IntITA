<?php

class m180313_151022_create_cms_footer_table extends CDbMigration
{
	public function up()
	{
	    $this->createTable('cms_general_settings', array(
            'id' => 'INT PRIMARY KEY AUTO_INCREMENT',
            'id_organization' => 'INT(10) NOT NULL',
            'logo' => 'VARCHAR(255) DEFAULT NULL',
            'mobile_phone' => 'VARCHAR(15) NULL DEFAULT NULL',
            'mobile_phone_2' => 'VARCHAR(15) NULL DEFAULT NULL',
            'email' => 'VARCHAR(255) NULL DEFAULT NULL',
            'twitter' => 'VARCHAR(255) NOT NULL',
            'youtube' => 'VARCHAR(255) NOT NULL',
            'google' => 'VARCHAR(255) NOT NULL',
            'facebook' => 'VARCHAR(255) NOT NULL',
            'linkedin' => 'VARCHAR(255) NOT NULL',
            'instagram' => 'VARCHAR(255) NOT NULL',
            'footer_background_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'header_background_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'news_background_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'about_us_background_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'footer_link_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'header_link_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'general_link_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'footer_hover_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'header_hover_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'general_hover_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'footer_border_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'header_border_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'news_image_border_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'news_text_border_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'title_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'subtitle_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'text_color' => 'VARCHAR(32) NULL DEFAULT NULL',
            'icon_shadow_color' => 'VARCHAR(32) NULL DEFAULT NULL',

        ));

        $this->addForeignKey('FK_cms_footer_organization','cms_general_settings','id_organization','organization','id', 'RESTRICT', 'RESTRICT');
	}

	public function down()
	{
        $this->dropForeignKey('FK_cms_footer_organization','cms_general_settings');
        $this->dropTable('cms_general_settings');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}