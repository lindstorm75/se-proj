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
	return view("lmao");
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

Route::get('/auth/redirect', "Auth\\GoogleAuthController@handleProviderRedirect");

use App\User;

Route::get('/auth/callback', "Auth\\GoogleAuthController@handleProviderCallback");

Route::get("register", function() {
	return redirect("https://www.youtube.com/watch?v=dQw4w9WgXcQ");
})->name("register");

use Illuminate\Support\Facades\Hash;
use App\Department;
use App\Role;

Route::get("create", function() {
	// $sub = Role::create([
	// 	"name" => "subordinate",
	// 	"power_level" => 0
	// ]);
	// $user = Role::create([
	// 	"name" => "user",
	// 	"power_level" => 1
	// ]);
	// $head = Role::create([
	// 	"name" => "head",
	// 	"power_level" => 1
	// ]);
	// $dean = Role::create([
	// 	"name" => "dean",
	// 	"power_level" => 2
	// ]);
	// $admin = Role::create([
	// 	"name" => "admin",
	// 	"power_level" => 3
	// ]);
	// dd($sub, $user);
	// $dep1 = Department::create([
	// 	"en_name" => "Faculty of Engineering",
	// 	"th_name" => "คณะวิศวกรรมศาสตร์"
	// ]);
	// $dep2 = Department::create([
	// 	"en_name" => "Computer Engineering",
	// 	"th_name" => "วิศวกรรมคอมพิวเตอร์"
	// ]);
	// dd($dep1, $dep2);
	$admin = Role::where("name", "admin")->first();
	$computer = Department::where("th_name", "วิศวกรรมคอมพิวเตอร์")->first();
	$user = User::create([
		"full_name" => "God",
		"username" => "godza555",
		"email" => "god@gmail.com",
		"password" => Hash::make("12345678"),
		"department_id" => $computer->id,
		"role_id" => $admin->id
	]);
	dd($user);
	$departments = array(
		array(
			"th_name" => "คณะวิศวกรรมศาสตร์",
			"en_name" => "Faculty of Engineering"
		),
		array(
			"th_name" => "วิศวกรรมโยธา",
			"en_name" => "Civil Engineering"
		),
		array(
			"th_name" => "วิศวกรรมไฟฟ้า",
			"en_name" => "Electrical Engineering"
		),
		array(
			"th_name" => "วิศวกรรมเกษตร",
			"en_name" => "Agricultural Engineering"
		),
		array(
			"th_name" => "วิศวกรรมอุตสาหการ",
			"en_name" => "Industrial Engineering"
		),
		array(
			"th_name" => "วิศวกรรมเครื่องกล",
			"en_name" => "Mechanical Engineering"
		),
		array(
			"th_name" => "วิศวกรรมสิ่งแวดล้อม",
			"en_name" => "Environmental Engineering"
		),
		array(
			"th_name" => "วิศวกรรมเคมี",
			"en_name" => "Chemical Engineering"
		),
		array(
			"th_name" => "วิศวกรรมคอมพิวเตอร์",
			"en_name" => "Computer Engineering"
		),
		array(
			"th_name" => "วิศวกรรมระบบอิเล็กทรอนิกส์",
			"en_name" => "Electronic Systems Engineering"
		),
		array(
			"th_name" => "วิศวกรรมระบบอัตโนมัติ หุ่นยนต์ และปัญญาประดิษฐ์",
			"en_name" => "AI Systems Engineering"
		),
		array(
			"th_name" => "วิศวกรรมระบบอิเล็กทรอนิกส์",
			"en_name" => "Electronic Systems Engineering"
		),
		array(
			"th_name" => "วิศวกรรมโทรคมนาคม",
			"en_name" => "Telecommunications Engineering"
		),
		array(
			"th_name" => "วิศวกรรมโลจิสติกส์",
			"en_name" => "Logistics Engineering"
		),
		array(
			"th_name" => "วิศวกรรมเคมี(นานาชาติ)",
			"en_name" => "International Chemical Engineering"
		),
		array(
			"th_name" => "วิศวกรรมสื่อดิจิทัล",
			"en_name" => "Digital Media Engineering"
		),
	);
	
	// foreach ($departments as $dep)
	// {
	// 	Department::create([
	// 		"en_name" => $dep["en_name"],
	// 		"th_name" => $dep["th_name"]
	// 	]);
	// }

	// dd(Department::where("id", 17)->first());

	return redirect()->route("login");
});

Route::get("test", function() {
	dd(auth()->user()->role_id);
});