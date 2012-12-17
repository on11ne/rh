<?php

class m121217_123538_create_user_rules_agree extends CDbMigration
{
	public function up()
	{
        $this->addColumn('tbl_users', 'agree', 'tinyint(4)');
	}

	public function down()
	{
		echo "m121217_123538_create_user_rules_agree does not support migration down.\n";
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