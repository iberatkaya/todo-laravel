<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Controllers\NoteController;

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

Route::post('/addnote', [NoteController::class, "addNote"]);


Route::post('/updatenotes', [NoteController::class, "updateNotes"]);