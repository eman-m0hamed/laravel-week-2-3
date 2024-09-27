<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // DB::insert("insert into users");
        // DB::table("users")->insert(([]));
        // DB::select("select * from users");
        // $users = DB::table(table: 'users')->get();
        $users = User::get();
        return view('users.index', ['users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $data = $request->except(['_token']);
        $data = $request->all();

        // $user = DB::table("users")->where('email', $data['email'])->first();
        $user = User::where('email', $data['email'])->first();

        if($user){
            return back()->with(['message' =>"user already  exists"]);
        }

        // DB::table("users")->insert($data);
       User::create($data);
        return redirect("/users")->with("message","user added successfully");


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        // email = eman
        $arr= [1000, 6000, 8000];
        // $user = DB::table("users")
        // ->where("email", 'like', "%$email%" )
        // ->orwhere('id', ">", 10)
        // ->where('salary', '>', $salary)
        // ->whereIn($val, $arr)
        // ->whereBetween()
        // ->orderBy('created_at', 'DESC')

        // ->get();

        // $user = DB::table('users')->findOrFail($id);
        $user = User::findOrFail($id);
        // dd($user)
        // if($user){
            return view("users.show", ['user'=>$user]);
        // }
        // abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $department= [];
        if($user){
            return view("users.edit", compact(['user', 'department']));
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->except(['_token', '_method']);
        // $data = $request->all();
        $user = User::where('id', $id)->update($data); // ['name' => 'eman', ]
        return redirect("/users")->with("message","user updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
       User::where('id', $id)->delete();

        return redirect('/users')->with('message', "user deleted successfully");
    }

    function createOrder(){

    }
}
