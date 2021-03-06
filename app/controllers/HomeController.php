<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function showLogin()
	{
		// show the form
		return View::make('login');
	}
	public function showHome()
	{
		// show the form
		return View::make('home');
	}
	public function showNewUser()
	{
		return View::make('newUser');	
	}

	public function doNewUser()
	{
		# code...
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);



		$user = new User;
		$user->nombre = Input::get('nombre');
		$user->user = Input::get('user');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
  		$user->estado = 'A';
  		$si = $user->save();
  		if($si){
  			return Redirect::to('newuser')->with('mens', 'Se agrego el usuario ' . $user->user);

  			
  		}else{
  			return Redirect::to('newuser')->with('mens', 'Ocurrio un error, no se pudo agregar el usuario ' . $user->user);
  			
  		}
  		//var_dump($user->save());

	}

	public function doLogin()
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo success (even though echoing in a controller is bad)
				echo 'SUCCESS!';
				return Redirect::to('home');

			} else {	 	

				// validation not successful, send back to form	
				return Redirect::to('login');

			}

		}
	}

	public function doLogout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('login'); // redirect the user to the login screen
	}

	public function showWelcome()
	{
		return View::make('hello');
	}

}