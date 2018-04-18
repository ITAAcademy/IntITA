<?php

class m180407_122256_add_column_cms_footer_table extends CDbMigration
{

	public function safeUp()
	{
        $this->addColumn('cms_general_settings', 'title', 'VARCHAR(255) NULL DEFAULT NULL');
        $this->addColumn('cms_general_settings', 'subtitle', 'VARCHAR(255) NULL DEFAULT NULL');
        $this->addColumn('cms_general_settings', 'title_2', 'VARCHAR(255) NULL DEFAULT NULL');
        $this->addColumn('cms_general_settings', 'subtitle_2', 'VARCHAR(255) NULL DEFAULT NULL');
        $this->addColumn('cms_general_settings', 'news_date_color', 'VARCHAR(32) NULL DEFAULT NULL');
	}

	public function safeDown()
	{
        echo "m180407_122256_add_column_cms_footer_table does going down.\n";
        $this->dropColumn('cms_general_settings', 'title');
        $this->dropColumn('cms_general_settings', 'subtitle');
        $this->dropColumn('cms_general_settings', 'title_2');
        $this->dropColumn('cms_general_settings', 'subtitle_2');
        $this->dropColumn('cms_general_settings', 'news_date_color');
        return true;
	}

}

