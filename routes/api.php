<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\FetchCommonDataController;
use App\Http\Controllers\FetchUserDataController;
use App\Http\Controllers\ReminderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('message/recive', [ChatController::class, 'reciveMessage']);


// Route to fetch user data
Route::post('user/fetch', [FetchUserDataController::class, 'fetchUserData']);
Route::post('user/exam-result', [FetchUserDataController::class, 'fetchUserExamResult']);

//user reminders
Route::post('user/reminders', [ReminderController::class, 'fetchUserReminders']);
Route::post('user/reminder/create', [ReminderController::class, 'CreateUserReminder']);
Route::post('user/reminder/update', [ReminderController::class, 'UpdateUserReminder']);
Route::post('user/reminder/delete', [ReminderController::class, 'DeleteUserReminder']);

// Route to fetch common data
Route::get('/department/data/{id?}', [FetchCommonDataController::class, 'fetchDepartmentData']);
Route::get('/event/data/{id?}', [FetchCommonDataController::class, 'fetchEventData']);
Route::get('/degree-programme/data/{id?}', [FetchCommonDataController::class, 'fetchDegreeProgrammeData']);
Route::get('/course-module/data/{id?}', [FetchCommonDataController::class, 'fetchCourseModuleData']);
Route::get('/student-batch/data/{id?}', [FetchCommonDataController::class, 'fetchStudentBatchData']);

