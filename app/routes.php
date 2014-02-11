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

Route::get('/user', function()
{
  $user = new User;
  $user->name = "Philipp Brown";
  $user->username = 'philipbrown';
  $user->email = 'phil@ipbrown.com';
  $user->password = 'deadgiveaway';
  $user->password_confirmation = 'deadgiveaway';
  var_dump($user->save());
  // Create a new Post
	$post = new Post(array('body' => 'Yada yada yada'));
	// Grab User 1
	$user = User::find(2);
	// Save the Post
	$user->posts()->save($post);
	//create a new person
	$people = new People;
	$people->name = "Marce Elizeche";
	$people->email = "melizeche@gmail.com";
	$people->area = "IT";
	$people->position = "Jefe";
	$people->degree = "1";
	var_dump($people->save());
	


});

Route::get('/po', function()
{
	// Create a new Post
	$post = new Post(array('body' => 'Yada yada yada'));
	// Grab User 1
	$user = User::find(2);
	// Save the Post
	$user->posts()->save($post);
});