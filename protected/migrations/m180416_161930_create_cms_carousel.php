<?php

class m180416_161930_create_cms_carousel extends CDbMigration
{
	public function up()
	{
        $this->createTable('cms_carousel', array(
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'id_organization' => 'SMALLINT UNSIGNED NOT NULL',
            'position' => 'MEDIUMINT UNSIGNED NOT NULL',
            'src' => 'CHAR(100) NOT NULL',
            'title' => 'TEXT NOT NULL DEFAULT \'\'',
        ));
        $this->createIndex('org_index', 'cms_carousel', 'id_organization', false);
        $this->addForeignKey('FK_cms_carousel_organization','cms_carousel','id_organization','organization','id', 'RESTRICT', 'RESTRICT');
	}

	public function down()
	{
        $this->dropForeignKey('FK_cms_carousel_organization','cms_carousel');
        $this->dropIndex('org_index', 'cms_carousel');
        $this->dropTable('cms_carousel');
	}
}