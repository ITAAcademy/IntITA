<?php

class m200625_082853_regenerate_user_passwords extends CDbMigration
{
	public function up()
	{
		$users = StudentReg::model()->findAll();
		foreach ($users as $user) {
			$user->password = password_hash(random_bytes(60), PASSWORD_BCRYPT, ['cost' => 12]);
			$user->reg_time = $user->reg_time === '0000-00-00 00:00:00' ? null : $user->reg_time;
			$user->save();
		}
	}

	public function down()
	{
		echo "nothing to down";
		return false;
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