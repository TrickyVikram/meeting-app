<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [MeetingController::class,  'meetingUser'])->name('meetingUser');

Route::get('/createMeeting', [MeetingController::class,  'createMeeting'])->name('createMeeting');


