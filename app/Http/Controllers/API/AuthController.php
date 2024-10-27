<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function register(Request $request)
    {

        try {
            $validData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'image' => 'required|file|mimes:jpg,jpeg,png',
            ]);

            // dd($request->all(), $validData);

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();


            $image->move('images', $imageName);

            $validData['image'] = $imageName;

            User::create($validData);

            return response(['message'=> 'account created successfully']);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }


    public function login(Request $request)
    {
        $validData =  $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $remberMe = $request->input('remember', false);

        // User::where(['email'=>$validData['email'], 'password' =>$validData['password']])->first();

        $correct = Auth::attempt([
            'email' => $validData['email'],
            'password' => $validData['password'],
        ], $remberMe);

        if ($correct) {
            
           $response = [
            'token' => $request->user()->createToken('api-token')->plainTextToken,
            'message' => 'login success'
           ];
            return response($response);
        }
        else{
            $response = [
                'message' => 'invalid email or password'
            ];
            return response($response);
        }
    }


    function profile(){
        return response(['data' =>Auth::guard('api')->user()]);
    }
}
