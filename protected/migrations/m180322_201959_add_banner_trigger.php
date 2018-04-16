<?php

class m180322_201959_add_banner_trigger extends CDbMigration
{
	public function up()
	{
	    $sql = "	    
            CREATE TRIGGER `banners_before_insert` BEFORE INSERT ON `banners` FOR EACH ROW BEGIN
                    SET NEW.slide_position = (SELECT MAX(slide_position)+1 FROM banners);
            END
	    ";
	    $this->execute($sql);
	}

	public function down()
	{
        $this->execute('DROP TRIGGER banners_before_insert');
		echo "m180322_201959_add_banner_trigger does not support migration down.\n";
		return true;
	}

}