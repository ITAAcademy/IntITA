<?php

class m200625_082853_regenerate_user_passwords extends CDbMigration
{
	public function up()
	{
		$users = StudentReg::model()->findAll();
		$total = count($users);
		foreach ($users as $key => $user) {
			$step = $key + 1;
			echo "step {$step} from {$total}\n";
			$user->password = password_hash('YzJBSzV4TUhkMzc3d3', PASSWORD_BCRYPT, ['cost' => 12]);
			$user->reg_time = $user->reg_time === '0000-00-00 00:00:00' ? null : $user->reg_time;
			$user->save();
		}
	}

	public function down()
	{
		echo "nothing to down";
		return true;
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