<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::get("print", "PDFController@get")->name("getPdf");
	Route::get("selection", "SelectionController@index")->name("selection");
	Route::get("update", "UpdateController@index")->name("update");
	Route::post("update", "UpdateController@store");
	Route::get("head", "HeadController@index")->name("head");

	// Admin
	Route::get("settings", "SettingsController@index")->name("settings");
	Route::post("settings/add", "SettingsController@store")->name("settings.add");
	Route::post("settings/update", "SettingsController@update")->name("settings.update");
	Route::get("assign", "AssignController@index")->name("assign");
	Route::post("assign", "AssignController@store");

	//
	Route::get("waiting", "WaitingOKRController@index")->name("waiting");
});

Route::get('/clear-cache', function() {
	$exitCode = Artisan::call('config:clear');
	$exitCode = Artisan::call('cache:clear');
	$exitCode = Artisan::call('config:cache');
	return 'DONE'; //Return anything
});

use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', "GoogleAuthController@handleProviderRedirect");

use App\User;
use App\SocialAccount;

Route::get('/auth/callback', "GoogleAuthController@handleProviderCallback");

Route::get("register", function() {
	return redirect("https://www.youtube.com/watch?v=dQw4w9WgXcQ");
})->name("register");

use Illuminate\Support\Facades\Hash;
use App\Department;
use App\Role;

Route::get("create", function() {
	// $user = Role::where("name", "user")->first();
	// $computer = Department::where("name", "วิศวกรรมคอมพิวเตอร์")->first();
	// $user = User::create([
	// 	"full_name" => "Thanapong Angkha",
	// 	"username" => "lindstorm75",
	// 	"email" => "thanapong.a@kkumail.com",
	// 	"password" => Hash::make("1234"),
	// 	"department_id" => $computer->id,
	// 	"role_id" => $user->id
	// ]);
	// dd($user);
	return redirect()->route("login");
});

Route::get("test", function() {
	$userRole = Role::where("id", auth()->user()->role_id)->first();
	dd($userRole);
});