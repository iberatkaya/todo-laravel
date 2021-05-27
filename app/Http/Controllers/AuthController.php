<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        }

        $email = $request->email;
        $password = $request->password;

        $credentials = ["email" => $email, "password" => $password];

        if (Auth::attempt($credentials)) {
            return redirect("/");
        }
        
        return redirect()->back()->withErrors(['Incorrect email or password!']);
    }

    public function logout(Request $request) {
        error_log("logout");
        Auth::logout();
        return redirect()->back();
    }

    public function signup(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        }

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        error_log(json_encode([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]));

        $userExists = User::where('email', $email);

        if($userExists->first()){
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['User already exists!']);
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $authAttempt = Auth::attempt([
            'email' => $email,
            'password'  => $password
        ]);

        error_log($authAttempt);


        if ($authAttempt) {
            return redirect('/');
        }
    }
}
