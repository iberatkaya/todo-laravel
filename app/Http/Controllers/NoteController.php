<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function getNotes(){
        $notes = Note::where('owner_id', Auth::id())->orderBy('created_at', 'desc')->get();
    
        return view('home', ["notes" => $notes]);
    }

    public function addNote(Request $request){
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
        $note->owner_id = Auth::id();
        $note->done = false;
        $note->save();
    
        return redirect()->back();
    }

    public function updateNotes(Request $request){
        $validator = Validator::make($request->all(), [
            'noteIds.*' => 'nullable'
        ]);
    
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        }
    
        foreach($request->noteIds as $key => $val) {
            Note::where("id", $key)->update(["done" => $val == "1"]);
        }
    
        return redirect()->back();
    }
}
