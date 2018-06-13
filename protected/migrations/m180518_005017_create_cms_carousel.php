<?php

class m180518_005017_create_cms_carousel extends CDbMigration
{
    public function up()
    {
        $this->createTable('cms_carousel', array(
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'id_organization' => 'INT(11) NOT NULL',
            'position' => 'MEDIUMINT UNSIGNED NOT NULL',
            'src' => 'VARCHAR(256) NOT NULL',
            'title' => 'VARCHAR(256) DEFAULT NULL',
            'description' => 'TEXT DEFAULT NULL',
        ));
        $this->addForeignKey('FK_cms_carousel_organization','cms_carousel','id_organization','organization','id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropForeignKey('FK_cms_carousel_organization','cms_carousel');
        $this->dropTable('cms_carousel');
    }
}