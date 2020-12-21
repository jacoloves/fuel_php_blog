<?php

namespace Fuel\Migrations;

class Create_chats
{
	public function up()
	{
		\DBUtil::create_table('chats', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'name' => array('constraint' => 30, 'null' => false, 'type' => 'varchar'),
			'published_at' => array('null' => false, 'type' => 'datetime'),
			'body' => array('null' => false, 'type' => 'text'),
			'created_at' => array('constraint' => 11, 'null' => true, 'type' => 'int', 'unsigned' => true),
			'updated_at' => array('constraint' => 11, 'null' => true, 'type' => 'int', 'unsigned' => true),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('chats');
	}
}