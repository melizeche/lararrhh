<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

	// route to show the login form
Route::get('login', array('uses' => 'HomeController@showLogin'));

	// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::get('logout', array('uses' => 'HomeController@doLogout'));
Route::get('web2',array('before' => 'auth', function()
{
	echo "AAA";
}
	));

Route::get('home', array('uses' => 'HomeController@showHome'));

Route::get('/user', function()
{
  $user = new User;
  $user->nombre = "Roberto";
  $user->user = 'robert';
  $user->email = 'r@r.com';
  $user->password = Hash::make('12345678');
  $user->estado = 'A';
  #$user->id=3;
  #$user->usuario=5;

  #$user->password_confirmation = 'deadgiveaway';
  var_dump($user->save());
  // Create a new Post
#	$post = new Post(array('body' => date("d-m-Y h:i:s").'Yada yada yada'));
	// Grab User 1
	$user = User::find(2);
	echo $user->nombre;
	// Save the Post
	#$user->posts()->save($post);
	//create a new person
#	$people = new People;
#	$people->name = "Marce Elizeche";
#	$people->email = "melizeche@gmail.com";

#	$people->area = "IT";
#	$people->position = "Jefe";
#	$people->degree = "1";
#	var_dump($people->save());



});

Route::get('/list', array('before' => 'auth', function()
{
	$user = User::find(1);
	echo($user->nombre . " ");
	$carr = Carrera::all();
	echo($carr->first()->titulo_cargo);
	foreach ($carr as $ca)
	{
    	echo("<br>");
    	echo($ca->numero_doc);

	}
	echo (Hash::make('12345'));
}));

