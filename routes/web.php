<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Note;

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
    $notes = Note::orderBy('created_at', 'desc')->get();
    error_log(json_encode($notes));

    return view('home', ["notes" => $notes]);
});

Route::post('/addtask', function (Request $request) {
    error_log($request->input("name"));
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'done' => 'nullable'
    ]);

    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator);
    }

    $note = new Note;
    $note->name = $request->name;
    $note->done = false;
    $note->save();

    return redirect()->back()->with('success_message','any message you want');
});


Route::post('/updatetasks', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'noteIds.*' => 'nullable'
    ]);

    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator);
    }

    error_log(json_encode($request->all()));
    error_log(json_encode($request->noteIds));

    foreach($request->noteIds as $key => $val) {
        error_log($key);
        error_log($val);
        error_log(json_encode($val == "1"));
        Note::where("id", $key)->update(["done" => $val == "1"]);
    }

    return redirect()->back()->with('success_message','any message you want');
});