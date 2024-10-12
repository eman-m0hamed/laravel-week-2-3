<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //


    public function registerForm(Request $request){

        return view('users.create');
    }
    public function register(Request $request){

        try{


        $validData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png',
        ]);

        // dd($request->all(), $validData);

        $image = $request->file('image');

        $imageName = time(). '.' . $image->getClientOriginalExtension();


        $image->move('public/images',$imageName);

        $validData['image'] = $imageName;

        User::create($validData);

        return back()->with('message','account created successfully');
    }catch(\Exception $e){
        dd($e->getMessage());
    }
    }
    public function loginForm(Request $request){

        return view('Auth.login');
    }
    public function login(Request $request){
       $validData =  $request->validate([
            'email' =>'required',
            'password' =>'required',
        ]);

        $remberMe = $request->input('remember', false);

        // User::where(['email'=>$validData['email'], 'password' =>$validData['password']])->first();

        $correct = Auth::attempt([
            'email' =>$validData['email'],
            'password' =>$validData['password'],
        ], $remberMe);

        if($correct){
            $request->session()->regenerate();
            return redirect('/home');
        }
    }
    public function logout(Request $request){

    }
}
