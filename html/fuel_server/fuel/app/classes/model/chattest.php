<?php
use Orm\Model;

class Model_Chattest extends Model
{
	protected static $_properties = array(
		'id',
		'id',
		'name',
		'published_at',
		'body',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('id', 'Id', 'required|valid_string[numeric]');
		$val->add_field('name', 'Name', 'required|max_length[30]');
		$val->add_field('published_at', 'Published At', 'required');
		$val->add_field('body', 'Body', 'required');

		return $val;
	}

}
