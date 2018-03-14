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

		View::Render('settings.users.list', $this->data, clout_settings('view_folder'));
	}

    public function create()
    {
        View::Render('settings.users.create', $this->data, clout_settings('view_folder'));
    }

    public function delete($user_id)
    {
        $user = User::find($user_id);
        $user->delete();

        Functions::redirect(clout_settings('clout_url') . '/settings/users');
    }

    public function edit($user_id)
    {
    	$this->data['user'] = User::find($user_id);

    	View::Render('settings.users.edit', $this->data, clout_settings('view_folder'));
    }

	public function store()
	{
		$user = new User();
		$user->username = $_POST['username'];
		$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$user->active = $_POST['active'];
		$user->save();

		Functions::redirect(clout_settings('clout_url') . '/settings/users');
	}

	public function update($user_id)
	{
		$user = User::find($user_id);
		$user->username = $_POST['username'];
		if (isset($_POST['password'])) {
			$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		}
		if ($user_id != 1) {
			$user->active = $_POST['active'];
		}
		$user->save();

		Functions::redirect(clout_settings('clout_url') . '/settings/users');
	}
}
