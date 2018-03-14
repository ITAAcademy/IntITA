<?php

class m180305_120807_create_library_depends_book_category_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('library_depends_book_category',[
            'id'=> 'INT PRIMARY KEY AUTO_INCREMENT',
            'id_book' =>  'INT NOT NULL',
            'id_category' => 'INT NOT NULL',
        ]);
        $this->addForeignKey(
            'chain_to_book',
            'library_depends_book_category',
            'id_book',
            'library',
            'id',
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
          'chain_to_category',
          'library_depends_book_category',
          'id_category',
          'library_category',
          'id',
          'RESTRICT',
          'RESTRICT'
        );
	}

	public function down()
	{
		$this->dropTable('library_depends_book_category');
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