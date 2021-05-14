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

require __DIR__ . '/auth.php';

Route::get('/home', 'HomeController@index')->name('homeuser');
Route::get('/', 'HomeController@index');
Auth::routes();
Route::get('/subjects/{slug}', 'SubjectController@index')->name('subject');
Route::post('/subjects/{slug}', 'SubjectController@enroll')->name('subjectenroll');
Route::get('/subjects/{slug}/quizzes/{name}', 'QuizController@index')->name('quiz');
Route::post('/subjects/{slug}/quizzes/{name}', 'QuizController@submit')->name('quizpost');
Route::get('/search', 'SearchController@index')->name('search');
Route::get('/mysubjects', 'MySubjectsController@index')->name('mysubjects');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile', 'ProfileController@update')->name('profilepost');
Route::get('/allsubjects', 'AllSubjectsController@index')->name('allsubjects');

Route::get('/logout', function () {
	if ( Auth::check() ) {
		Auth::logout();
		return redirect('/home');
	} else {
		return redirect('/');
	}
})->name('logout');

// Admin Routes
Route::group(['middleware' => ['auth', "admin"]], function () {
	Route::get('admin', function () {
		return redirect('admin/dashboard');
	});

	Route::get('/admin/dashboard', 'Admin\HomeController@index')->name('home');
	Route::resource('/admin/admins', 'Admin\AdminController', ['except' => ['show']]);
	Route::resource('/admin/users', 'Admin\UserController', ['except' => ['show']]);
	Route::resource('/admin/subjects', 'Admin\SubjectController');
	Route::resource('/admin/questions', 'Admin\QuestionController');
	Route::resource('/admin/subjects.quizzes', 'Admin\SubjectQuizController');
	Route::resource('admin/quizzes.questions', 'Admin\QuizQuestionController');
	Route::resource('/admin/quizzes', 'Admin\QuizController');
	Route::get('admin/profile', ['as' => 'profile.edit', 'uses' => 'Admin\ProfileController@edit']);
	Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'Admin\ProfileController@update']);
	Route::put('admin/profile/password', ['as' => 'profile.password', 'uses' => 'Admin\ProfileController@password']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
