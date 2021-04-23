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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::post('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::post("profile/update", "ProfileController@update")->name("updateProfile");
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	//
	Route::get("schedule", "ScheduleController@index")->name("schedule");

	Route::post("generate", "PDFController@generate")->name("generatePdf");
	Route::get("getPdf/storage/uploads/{filename}", "PDFController@getPdf")->name("getPdf");
	Route::get("selection", "SelectionController@index")->name("selection");
	Route::post("selection/continue", "SelectionController@continue")->name("continue");
	Route::post("selection", "SelectionController@store");
	Route::get("update", "UpdateController@index")->name("update");
	Route::post("update", "UpdateController@store");
	Route::get("head", "HeadController@index")->name("head");

	// Admin
	Route::get("okr", "OkrController@index")->name("okr");
	Route::post("okr/add", "OkrController@store")->name("okr.add");
	Route::post("okr/update", "OkrController@update")->name("okr.update");
	Route::get("okr/{id}", "OkrController@destroy")->name("okr.delete");
	Route::get("head", "HeadController@index")->name("head");
	Route::post("head", "HeadController@store");
	Route::get("user", "UserManagementController@index")->name("manageUser");
	Route::post("user", "UserManagementController@update");
	Route::get("user/{id}", "UserManagementController@destroy")->name("manageUser.delete");
	Route::get("assign", "AssignController@index")->name("assign");

	//
	Route::get("waiting", "OkrRequestController@index")->name("waiting");
	Route::post("waiting/decline", "OkrRequestController@destroy")->name("declineOkr");
	Route::post("waiting/confirm", "OkrRequestController@update")->name("confirmOkr");
});

Route::get('/clear-cache', function() {
	$exitCode = Artisan::call('config:clear');
	$exitCode = Artisan::call('cache:clear');
	$exitCode = Artisan::call('config:cache');
	return 'DONE';
});

Route::get("/howto", "HowToController@index")->name("howto");

Route::fallback(function ()
{
    return view("notfound");
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

Route::get("createRoles", function() {
	$sub = Role::create([
		"name" => "subordinate",
		"power_level" => 0
	]);
	$user = Role::create([
		"name" => "user",
		"power_level" => 1
	]);
	$head = Role::create([
		"name" => "head",
		"power_level" => 2
	]);
	$dean = Role::create([
		"name" => "dean",
		"power_level" => 3
	]);
	$admin = Role::create([
		"name" => "admin",
		"power_level" => 4
	]);
	dd(Role::all());
	return redirect()->route("login");
});

Route::get("createDeps", function() {
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
	
	foreach ($departments as $dep)
	{
		Department::create([
			"en_name" => $dep["en_name"],
			"th_name" => $dep["th_name"]
		]);
	}
	dd(Department::all());
});

use App\Okr;

Route::get("createSelection", function() {
	$okrs = array(
		array(
			"category" => "technical",
			"subject" => "จำนวนนักศึกษาระดับบัณฑิตศึกษาภายใต้การดูแลของท่านที่ได้รับการสนับสนุนที่มีคุณภาพมากกว่าเกณฑ์มาตรฐาน สกอ.",
			"detail" => "ท่านได้เป็นที่ปรึกษาที่ดูแลนักศึกษาและทำให้นักศึกษามีผลงานตีพิมพ์มากกว่าเกณฑ์มาตรฐาน สกอ.",
			"unit" => "คน"
		),
		array(
			"category" => "technical",
			"subject" => "จำนวนโครงการวิจัยในรูปแบบแผนบูรณาการงานวิจัย (Research program)",
			"detail" => "อาจารย์ได้มีส่วนร่วมในการทำโครงการวิจัยที่เกิดจากการบูรณาการงานวิจัยร่วมกับคณะอื่น",
			"unit" => "โครงการ"
		),
		array(
			"category" => "technical",
			"subject" => "จำนวนโครงการที่ได้เริ่มดำเนินการการสร้างนวัตกรรมเชิงพาณิชย์",
			"detail" => "อาจารย์มีโครงการหรือกิจกรรมที่ดำเนินการไปสู่การเกิดนวัตกรรมที่ทำให้เกิดรายได้แก่คณะในอนาคต",
			"unit" => "โครงการ"
		),
		array(
			"category" => "technical",
			"subject" => "การดำรงตำแหน่งทางวิชาการที่สูงขึ้น",
			"detail" => "ในรอบ 1 มกราคม 2564 - 31 ธันวาคมี้ 2564 อาจารย์ได้รับการตั้งแต่งให้ดำรงตำแหน่งทางวิซาการที่สูงขึ้น โดยนับวันที่สภามหาวิทยาลัยเห็นชอบ",
			"unit" => "ศ., รศ., ผศ."
		),
		array(
			"category" => "technical",
			"subject" => "จำนวนเงินรายได้จากการบริการวิชาการ (จากการทำสัญญา)",
			"detail" => "มีโครงการที่ทำสัญญาและเกิดรายได้จากการบริการวิชาการให้แก่คณะ",
			"unit" => "บาท"
		),
		array(
			"category" => "technical",
			"subject" => "จำนวนโครงการบริการวิชาการที่ทำให้กับชุมชน",
			"detail" => "มีโครงการที่ไปบริการวิชาการให้กับชุมชน",
			"unit" => "โครงการ"
		),
		array(
			"category" => "technical",
			"subject" => "จำนวนผลงานที่ได้รับทุนสนับสนุนจากภายนอกที่ถูกนำไปใช้ประโยชน์ (CSV)",
			"detail" => "มีโครงการที่สามารถนำงบประมาณจากหน่วยงานภายนอกไปช่วยสังคม โดยใช้ผลงานหรือองค์ความรู้ที่อาจารย์ผลิตขึ้นมา",
			"unit" => "ผลงาน/ชิ้น"
		),
		array(
			"category" => "technical",
			"subject" => "จำนวนผลงานวิจัย/สิ่งประดิษฐ์/นวัตกรรม ด้าน Digital technology",
			"detail" => "ต้องมีผลงานด้าน Digital technology",
			"unit" => "ผลงาน/ชิ้น"
		),
		array(
			"category" => "technical",
			"subject" => "จำนวนนักศึกษาต่างชาติทั้งแบบปกติและ non-degree ภายใต้การดูแลของท่าน ทั้ง Outbound และ Inbound ระดับปริญญาตรีและระดับบัณฑิตศึกษา",
			"detail" => "ท่านได้เป็นที่ปรึกษาที่ดูแลนักศึกษาต่างชาติทั้งแบบปกติและ non-degree ภายใต้การดูแลของท่านทั้ง Outbound และ Inbound ระดับปริญญาตรีและระดับบัณฑิตศึกษา",
			"unit" => "คน"
		),
		array(
			"category" => "technical",
			"subject" => "โครงการฟาร์มอัจฉริยะ (Smart Farm)",
			"detail" => "มีโครงการหรือกิจกรรมที่เกี่ยวกับด้านฟาร์มอัจฉริยะ (Smart Farm) โดยโครงการนั้นต้องถูกนำมาใช้ในการเรียนการสอน การทำวิจัย และการบริการวิชาการ ครบทั้ง 3 ด้าน",
			"unit" => "โครงการ"
		),
		array(
			"category" => "technical",
			"subject" => "โครงการเมืองอัจฉริยะ (Smart City)",
			"detail" => "มีโครงการหรือกิจกรรมที่เกี่ยวกับด้านเมืองอัจฉริยะ (Smart City) โดยโครงการนั้นต้องถูกนำมาใช้ในการเรียนการสอน การทำวิจัย และการบริการวิชาการ ครบทั้ง 3 ด้าน",
			"unit" => "โครงการ"
		),
		array(
			"category" => "technical",
			"subject" => "จำนวนบทเรียนออนไลน์สะสม",
			"detail" => "มีการอัดวีดีโอบทเรียน เพื่อให้ นศ. สามารถดูย้อนหลังได้",
			"unit" => "บทเรียน"
		),
		array(
			"category" => "support",
			"subject" => "จำนวนโครงการที่ได้เริ่มดำเนินการ (การนวัตกรรมเชิงพาณิชย์)",
			"detail" => "โครงการหรือกิจกรรมที่ดำเนินการไปสู่การเกิดนวัฒกรรมที่ทำให้เกิดรายได้แก่คณะในอนาคต",
			"unit" => "โครงการ"
		),
		array(
			"category" => "support",
			"subject" => "จำนวนเงินรายได้จากการบริการวิชาการ (จากการทำสัญญา)",
			"detail" => "โครงการที่ทำสัญญาและเกิดรายได้จากการบริการวิชาการให้แก่คณะ",
			"unit" => "บาท"
		),
		array(
			"category" => "support",
			"subject" => "จำนวนโครงการบริการวิชาการที่ทำให้กับชุมชน",
			"detail" => "โครงการที่ไปบริการวิชาการให้กับชุมชน",
			"unit" => "โครงการ"
		),
		array(
			"category" => "support",
			"subject" => "จำนวนผลงานวิจัย/สิ่งประดิษฐ์/นวัตกรรม ด้าน Digital technology",
			"detail" => "ผลงานด้าน Digital technology",
			"unit" => "ผลงาน"
		),
		array(
			"category" => "support",
			"subject" => "จำนวนงานสะสมที่ได้รับการพัฒนาใหม่หรือปรับปรุง",
			"detail" => "งานที่มีการพัฒนาขั้นตอน/ระบบ/วิธีการทำงาน หรืองานที่พัฒนาขึ้นมาใหม่",
			"unit" => "ผลงาน"
		),
	);
	$adminRole = Role::where("name", "admin")->first();
	$admin = User::where("role_id", $adminRole->id)->first();
	foreach($okrs as $okr)
	{
		Okr::create([
			"category" => $okr["category"],
			"subject" => $okr["subject"],
			"detail" => $okr["detail"],
			"unit" => $okr["unit"],
			"creator_id" => $admin->id
		]);
	}

	dd(Okr::all());
});

Route::get("createDean", function() {
	$deanRole = Role::where("name", "dean")->first();
	$en = Department::where("th_name", "คณะวิศวกรรมศาสตร์")->first();
	$dean = User::create([
		"full_name" => "dean se-proj06",
		"username" => "dean",
		"email" => "dean.se-proj06@gmail.com",
		"password" => Hash::make("12345678"),
		"department_id" => $en->id,
		"role_id" => $deanRole->id,
		"position" => "รองศาสตราจารย์"
	]);
	dd($dean);
});

Route::get("createSubs", function() {
	$subRole = Role::where("name", "subordinate")->first();
	$industrial = Department::where("th_name", "วิศวกรรมอุตสาหการ")->first();
	$en = Department::where("th_name", "คณะวิศวกรรมศาสตร์")->first();
	$sub1 = User::create([
		"full_name" => "sub1 se-proj06",
		"username" => "sub1",
		"email" => "sub1.se-proj06@gmail.com",
		"password" => Hash::make("12345678"),
		"department_id" => $en->id,
		"role_id" => $subRole->id,
		"position" => "พนักงานรักษาความปลอดภัย"
	]);
	$sub1 = User::create([
		"full_name" => "sub2 se-proj",
		"username" => "sub2",
		"email" => "sub2.se-proj06@gmail.com",
		"password" => Hash::make("12345678"),
		"department_id" => $industrial->id,
		"role_id" => $subRole->id,
		"position" => "พนักงานทำความสะอาด"
	]);
	dd(User::all());
});

Route::get("createHead", function() {
	$headRole = Role::where("name", "head")->first();
	$civil = Department::where("th_name", "วิศวกรรมโยธา")->first();
	$head = User::create([
		"full_name" => "สมชัย ใจเกเร",
		"username" => "head",
		"email" => "head.se-proj06@gmail.com",
		"password" => Hash::make("12345678"),
		"department_id" => $civil->id,
		"role_id" => $headRole->id,
		"position" => "รองศาสตราจารย์"
	]);
	dd($head, User::all());
});

Route::get("crateAdmin", function() {
	$admin = Role::where("name", "admin")->first();
	$computer = Department::where("th_name", "วิศวกรรมคอมพิวเตอร์")->first();
	$user = User::create([
		"full_name" => "ลินุส โตร์วัลดส์",
		"username" => "admin",
		"email" => "admin.se-proj06@gmail.com",
		"password" => Hash::make("12345678"),
		"department_id" => $computer->id,
		"role_id" => $admin->id
	]);
	dd($user);
});

Route::get("createUsers", function() {
	$userRole = Role::where("name", "user")->first();
	$chemical = Department::where("th_name", "วิศวกรรมเคมี")->first();
	$electrical = Department::where("th_name", "วิศวกรรมไฟฟ้า")->first();
	$user1 = User::create([
		"full_name" => "สมหมาย ใจดี",
		"username" => "user1",
		"email" => "user1.se-proj06@gmail.com",
		"password" => Hash::make("12345678"),
		"department_id" => $chemical->id,
		"role_id" => $userRole->id,
		"position" => "ผู้ช่วยรองศาสตราจารย์"
	]);
	$user2 = User::create([
		"full_name" => "สมศรี ดีใจ",
		"username" => "user2",
		"email" => "user2.se-proj06@gmail.com",
		"password" => Hash::make("12345678"),
		"department_id" => $electrical->id,
		"role_id" => $userRole->id,
		"position" => "รองศาสตราจารย์"
	]);
	dd(User::all());
});