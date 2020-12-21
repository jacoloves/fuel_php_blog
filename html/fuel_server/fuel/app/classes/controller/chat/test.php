<?php
class Controller_Chat_Test extends Controller_Template
{

	public function action_index()
	{
		$data['chat_tests'] = Model_Chat_Test::find('all');
		$this->template->title = "Chat_tests";
		$this->template->content = View::forge('chat/test/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('chat/test');

		if ( ! $data['chat_test'] = Model_Chat_Test::find($id))
		{
			Session::set_flash('error', 'Could not find chat_test #'.$id);
			Response::redirect('chat/test');
		}

		$this->template->title = "Chat_test";
		$this->template->content = View::forge('chat/test/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Chat_Test::validate('create');

			if ($val->run())
			{
				$chat_test = Model_Chat_Test::forge(array(
					'id' => Input::post('id'),
					'name' => Input::post('name'),
					'published_at' => Input::post('published_at'),
					'body' => Input::post('body'),
				));

				if ($chat_test and $chat_test->save())
				{
					Session::set_flash('success', 'Added chat_test #'.$chat_test->id.'.');

					Response::redirect('chat/test');
				}

				else
				{
					Session::set_flash('error', 'Could not save chat_test.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Chat_Tests";
		$this->template->content = View::forge('chat/test/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('chat/test');

		if ( ! $chat_test = Model_Chat_Test::find($id))
		{
			Session::set_flash('error', 'Could not find chat_test #'.$id);
			Response::redirect('chat/test');
		}

		$val = Model_Chat_Test::validate('edit');

		if ($val->run())
		{
			$chat_test->id = Input::post('id');
			$chat_test->name = Input::post('name');
			$chat_test->published_at = Input::post('published_at');
			$chat_test->body = Input::post('body');

			if ($chat_test->save())
			{
				Session::set_flash('success', 'Updated chat_test #' . $id);

				Response::redirect('chat/test');
			}

			else
			{
				Session::set_flash('error', 'Could not update chat_test #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$chat_test->id = $val->validated('id');
				$chat_test->name = $val->validated('name');
				$chat_test->published_at = $val->validated('published_at');
				$chat_test->body = $val->validated('body');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('chat_test', $chat_test, false);
		}

		$this->template->title = "Chat_tests";
		$this->template->content = View::forge('chat/test/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('chat/test');

		if ($chat_test = Model_Chat_Test::find($id))
		{
			$chat_test->delete();

			Session::set_flash('success', 'Deleted chat_test #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete chat_test #'.$id);
		}

		Response::redirect('chat/test');

	}

}
