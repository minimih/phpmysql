<?php

class m131202_132711_create_default_users_and_assign_to_projects extends CDbMigration
{
	public function up()
	{
        $this->insert( 'tbl_user', array( 'email' => 'test1@notanaddress.com', 'username' => 'Max Muster', 'password' => MD5('test1') ) );
        $this->insert( 'tbl_user', array( 'email' => 'test2@notanaddress.com', 'username' => 'Sandra Sample', 'password' => MD5('test2') ) );

        $this->insert( 'tbl_project_user_assignment', array( 'project_id' => 1, 'user_id' => 1 ) );
        $this->insert( 'tbl_project_user_assignment', array( 'project_id' => 1, 'user_id' => 2 ) );
    }

	public function down()
	{
		echo "m131202_132711_create_default_users_and_assign_to_projects does not support migration down.\n";
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