<?php

namespace Fuel\Migrations;

class Create_draws
{
	public function up()
	{
		\DBUtil::create_table('draws', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'qishu' => array('constraint' => 11, 'type' => 'int'),
			'luckynum' => array('constraint' => 11, 'type' => 'int'),
			'begin_at' => array('type' => 'datetime'),
			'lucky_at' => array('type' => 'datetime'),
			'open_at' => array('type' => 'datetime'),
			'itemid' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('draws');
	}
}