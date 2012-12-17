<?php

class m121217_130607_field_phone_length extends CDbMigration
{
	public function up()
	{
        $this->alterColumn('tbl_users', 'phone', 'varchar(30)');
	}

	public function down()
	{
		echo "m121217_130607_field_phone_length does not support migration down.\n";
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