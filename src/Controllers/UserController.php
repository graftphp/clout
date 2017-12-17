<?php

namespace GraftPHP\Clout\Controllers;

use GraftPHP\Clout\Settings;
use GraftPHP\Clout\User;
use GraftPHP\Framework\Functions;
use GraftPHP\Framework\View;

class UserController extends CloutController
{
	public function index()
	{
		$this->data['users'] = User::all();

		View::Render('settings.users.list', $this->data, Settings::viewFolder());
	}

    public function create()
    {
        View::Render('settings.users.create', $this->data, Settings::viewFolder());
    }

    public function delete($user_id)
    {
        $user = User::find($user_id);
        $user->delete();

        Functions::redirect(Settings::cloutURL() . '/settings/users');
    }

    public function edit($user_id)
    {
    	$this->data['user'] = User::find($user_id);

    	View::Render('settings.users.edit', $this->data, Settings::viewFolder());
    }

	public function store()
	{
		$user = new User();
		$user->username = $_POST['username'];
		$user->password = password_hash($_POST['password']);
		$user->active = $_POST['active'];
		$user->save();

		Functions::redirect(Settings::cloutURL() . '/settings/users');
	}

	public function update($user_id)
	{
		$user = User::find($user_id);
		$user->username = $_POST['username'];
		if (isset($_POST['password'])) {
			$user->password = password_hash($_POST['password']);
		}
		$user->active = $_POST['active'];
		$user->save();

		Functions::redirect(Settings::cloutURL() . '/settings/users');
	}
}
