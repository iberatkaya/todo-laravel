<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [NoteController::class, "getNotes"]);


Route::get('/login', function () {
    return view("login");
});

Route::get('/signup', function () {
    return view("sign_up");
});

Route::post('/login', [AuthController::class, "login"]);
Route::post('/signup', [AuthController::class, "signup"]);
Route::post('/logout', [AuthController::class, "logout"]);

Route::post('/addnote', [NoteController::class, "addNote"])->middleware('auth');

Route::post('/updatenotes', [NoteController::class, "updateNotes"])->middleware('auth');