<?php

use Acme\Forms\RegistrationForm;

class RegistrationController extends \BaseController {

	/**
	 * RegistrationForm object
	 * 
	 * @var RegistrationForm
	 */
	protected $registrationForm;

	/**
	 * Constructor
	 * 
	 * @param RegistrationForm $registrationForm
	 */
	public function __construct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only(['username', 'email', 'password', 'password_confirmation']);

		$this->registrationForm->validate($input);

		$user = User::create($input);

		Auth::login($user);

		return Redirect::home();
	}

}