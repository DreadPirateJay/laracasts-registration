<?php

use Acme\Forms\LoginForm;

class SessionsController extends \BaseController {

	/**
	 * LoginForm object
	 * 
	 * @var LoginForm
	 */
	protected $loginForm;

	/**
	 * Default constructor
	 * 
	 * @param LoginForm $loginForm
	 */
	public function __construct(LoginForm $loginForm)
	{
		$this->loginForm = $loginForm;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only(['email', 'password']);

		$this->loginForm->validate($input);

		if (Auth::attempt($input)) {
			return Redirect::intended('/');
		}

		return Redirect::back()->withInput()->withFlashMessage('Invalid Login Credentials!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id = null)
	{
		Auth::logout();

		return Redirect::home();
	}

}