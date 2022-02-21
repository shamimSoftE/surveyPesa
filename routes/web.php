<?php

use App\Http\Controllers\BackEndController;
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


Route::get('/', [\App\Http\Controllers\FrontController::class, 'index'])->name('landing');
Route::get('/admin-login', [\App\Http\Controllers\FrontController::class, 'adminLogin'])->name('admin_login');
Route::post('/login-check', [\App\Http\Controllers\FrontController::class, 'userLogin'])->name('login_check');

// reference user registration
Route::get('referral_campaign/{id}', [\App\Http\Controllers\ReferController::class, 'register'])->name('reference_userRegister');
Route::post('/invited-user/store', [\App\Http\Controllers\ReferController::class, 'invitedUser'])->name('store_invitedUser');

// survey question for user
Route::get('questions',[\App\Http\Controllers\SurveyQuestionController::class, 'userQuestions'])->name('survey_question_forUser');
Route::post('user-answer-submit',[\App\Http\Controllers\UserAnswerController::class, 'userAns'])->name('user_ans');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [\App\Http\Controllers\BackEndController::class, 'dashboard'] )->name('dashboard');
    Route::get('/profile/{id}', [\App\Http\Controllers\BackEndController::class, 'profile'] )->name('user_profile');
    Route::get('/my-account/{id}', [\App\Http\Controllers\BackEndController::class, 'acUser'] )->name('account_user');
    Route::post('/profile/update/{id}', [\App\Http\Controllers\BackEndController::class, 'profileUpdate'] )->name('profile_update');

    // generate admin
    Route::get('admin-create', [\App\Http\Controllers\BackEndController::class, 'create'])->name('admin_page');
    Route::get('admin-delete/{id}', [\App\Http\Controllers\BackEndController::class, 'delete'])->name('admin_delete');
    Route::post('admin-store', [\App\Http\Controllers\BackEndController::class, 'store'])->name('admin_register');

    // withdraw
    Route::get('view-withdraw-page', [\App\Http\Controllers\WithdrawController::class, 'show'])->name('withdraw_page');
    Route::get('request-withdraw', [\App\Http\Controllers\WithdrawController::class, 'requestWithdraw'])->name('withdraw_request_user');
    Route::get('request-withdraw-two', [\App\Http\Controllers\WithdrawController::class, 'requestWithdrawTwo'])->name('withdraw_request_user_two');
    Route::post('withdraw-request-proccess', [\App\Http\Controllers\WithdrawController::class, 'withdraw'])->name('withdraw_request_complete');

    // withdraw for admin
    Route::prefix('withdraw')->group(function(){
        Route::get('pending-list', [\App\Http\Controllers\WithdrawController::class, 'pendingList'])->name('withdraw_request');
        Route::get('completed-list', [\App\Http\Controllers\WithdrawController::class, 'completedList'])->name('withdraw_completed');
        Route::get('status/{id}', [\App\Http\Controllers\WithdrawController::class, 'withdrawStatus'])->name('withdraw_status');
    });

    // survey question

    Route::prefix('survey-question')->group(function()
    {
        Route::get('list', [\App\Http\Controllers\SurveyQuestionController::class, 'index'])->name('surv_questions');
        Route::get('create', [\App\Http\Controllers\SurveyQuestionController::class, 'create'])->name('surv_questions_create');
        Route::post('save', [\App\Http\Controllers\SurveyQuestionController::class, 'store'])->name('surv_questions_store');
        Route::get('edit/{id}', [\App\Http\Controllers\SurveyQuestionController::class, 'edit'])->name('surv_questions_edit');
        Route::get('delete/{id}', [\App\Http\Controllers\SurveyQuestionController::class, 'destroy'])->name('surv_questions_delete');
        Route::post('update/{serveyQuestion}', [\App\Http\Controllers\SurveyQuestionController::class, 'update'])->name('surv_questions_update');
    });

    // suervey ans question
    Route::get('ans-survey-question-list', [\App\Http\Controllers\UserAnswerController::class, 'ansList'])->name('ans_servey');
    Route::get('ans-survey-question-delete/{id}', [\App\Http\Controllers\UserAnswerController::class, 'ansDel'])->name('surv_ans_del');


    // Route::get('withdraw-delete/{id}', [\App\Http\Controllers\WithdrawController::class, 'withdrawDelete'])->name('withdraw_delete');


    // site info
    Route::resource('site', \App\Http\Controllers\SiteInfoController::class);

});

require __DIR__.'/auth.php';
