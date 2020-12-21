<?php
class Controller_Chattest extends Controller_Template
{

	public function action_index()
	{
		$data['chattests'] = Model_Chattest::find('all');
		$this->template->title = "Chattests";
		$this->template->content = View::forge('chattest/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('chattest');

		if ( ! $data['chattest'] = Model_Chattest::find($id))
		{
			Session::set_flash('error', 'Could not find chattest #'.$id);
			Response::redirect('chattest');
		}

		$this->template->title = "Chattest";
		$this->template->content = View::forge('chattest/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Chattest::validate('create');

			if ($val->run())
			{
				$chattest = Model_Chattest::forge(array(
					'id' => Input::post('id'),
					'name' => Input::post('name'),
					'published_at' => Input::post('published_at'),
					'body' => Input::post('body'),
				));

				if ($chattest and $chattest->save())
				{
					Session::set_flash('success', 'Added chattest #'.$chattest->id.'.');

					Response::redirect('chattest');
				}

				else
				{
					Session::set_flash('error', 'Could not save chattest.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Chattests";
		$this->template->content = View::forge('chattest/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('chattest');

		if ( ! $chattest = Model_Chattest::find($id))
		{
			Session::set_flash('error', 'Could not find chattest #'.$id);
			Response::redirect('chattest');
		}

		$val = Model_Chattest::validate('edit');

		if ($val->run())
		{
			$chattest->id = Input::post('id');
			$chattest->name = Input::post('name');
			$chattest->published_at = Input::post('published_at');
			$chattest->body = Input::post('body');

			if ($chattest->save())
			{
				Session::set_flash('success', 'Updated chattest #' . $id);

				Response::redirect('chattest');
			}

			else
			{
				Session::set_flash('error', 'Could not update chattest #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$chattest->id = $val->validated('id');
				$chattest->name = $val->validated('name');
				$chattest->published_at = $val->validated('published_at');
				$chattest->body = $val->validated('body');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('chattest', $chattest, false);
		}

		$this->template->title = "Chattests";
		$this->template->content = View::forge('chattest/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('chattest');

		if ($chattest = Model_Chattest::find($id))
		{
			$chattest->delete();

			Session::set_flash('success', 'Deleted chattest #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete chattest #'.$id);
		}

		Response::redirect('chattest');

	}

}
