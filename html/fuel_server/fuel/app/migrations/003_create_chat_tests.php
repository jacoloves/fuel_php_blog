<?php

namespace Fuel\Migrations;

class Create_chat_tests
{
	public function up()
	{
		\DBUtil::create_table('chat_tests', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'name' => array('constraint' => 30, 'null' => false, 'type' => 'varchar'),
			'published_at' => array('null' => false, 'type' => 'datetime'),
			'body' => array('null' => false, 'type' => 'text'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('chat_tests');
	}
}