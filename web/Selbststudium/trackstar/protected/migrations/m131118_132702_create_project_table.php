<?php

class m131118_132702_create_project_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_project', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'description' => 'text NOT NULL',
            'create_time' => 'datetime DEFAULT NULL',
            'create_user_id' => 'int(11) DEFAULT NULL',
            'update_time' => 'datetime DEFAULT NULL',
            'update_user_id' => 'int(11) DEFAULT NULL',
        ), 'ENGINE=InnoDB');

        $this->insert( 'tbl_project', array(
            'id' => 1,
            'name' => 'Fany pants project',
            'description' => 'Whatever this is',
            'create_user_id' => 1
        ) );
	}

	public function down()
	{
        $this->dropTable('tbl_project');
	}
}