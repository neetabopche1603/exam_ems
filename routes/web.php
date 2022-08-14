<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Auth;

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
Route::get('admin_logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['prefix' => 'admin','middleware' => 'is_admin'], function () {
	// Admin Dashboard
	Route::get('/home',[AdminController::class,'adminHome'])->name('admin.home');	
	Route::get('add-student', [AdminController::class, 'addStudentForm'])->name('admin.addStudentForm');
    Route::post('add-student', [AdminController::class, 'studentRegister'])->name('admin.studentRegister');
    Route::get('edit-student/{id}', [AdminController::class, 'editStudentForm'])->name('admin.editStudentForm');
    Route::post('edit-student', [AdminController::class, 'studentUpdate'])->name('admin.studentUpdate');
    Route::get('all-student', [AdminController::class, 'showStudent'])->name('admin.showStudent');
    Route::get('view-student/{viewid}', [AdminController::class, 'studentView'])->name('admin.studentView');
    Route::get('delete-student/{id}', [AdminController::class, 'delete'])->name('admin.studentdelete');

	Route::get('add-subject',[AdminController::class,'addsubjectForm'])->name('admin.add-subject');
	Route::post('add-subject',[AdminController::class,'subjectStore'])->name('admin.subjectStore');
	Route::get('delete-subject/{sub_del_id}',[AdminController::class,'subject_delete'])->name('admin.subject_delete');

	Route::get('import-questions',[QuestionController::class,'importQuestions'])->name('import.question');
	Route::post('imported-questions',[QuestionController::class,'import'])->name('imported.question');

	Route::get('questions',[QuestionController::class,'index_question'])->name('admin.indexQuestion');
	Route::get('manualQuestions',[QuestionController::class,'manual_question'])->name('admin.manualQuestion');
	Route::post('manualQuestions',[QuestionController::class,'manual_queStore'])->name('admin.manualQuestionPost');

	Route::get('edit-ques/{id}',[QuestionController::class,'questionEditForm'])->name('admin.editQuestion');
	Route::post('edit-ques',[QuestionController::class,'questionUpdate'])->name('admin.editQuestionUpdate');
	Route::get('delete-ques/{quid}',[QuestionController::class,'questionDelete'])->name('admin.editQuestionDelete');

	Route::get('result',[QuestionController::class,'resultForm'])->name('admin.resultForm');
	Route::get('delete-result/{id}',[QuestionController::class,'deleteResult'])->name('admin.deleteResult');

	Route::get('send-mail',[AdminController::class,'sendmail'])->name('admin.sendMail');

});

//admin logout
Route::get('/admin_logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout');


Route::group(['prefix' => 'user','middleware' => 'auth'], function () {
	// Admin Dashboard
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/testing', [App\Http\Controllers\HomeController::class, 'testing'])->name('testing');
	Route::get('/exam',[App\Http\Controllers\HomeController::class,'exam'])->name('exam');
	Route::get('/join-exam/{id}',[App\Http\Controllers\HomeController::class,'joinExam'])->name('user.joinExam');
	Route::post('/submit-exam', [App\Http\Controllers\HomeController::class, 'submitExam'])->name('submitExam');
});

