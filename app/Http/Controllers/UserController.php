<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    /*public function changepassword($id){

        return view('user.password',['id'=>$id]);
    }

    public function changepassword_save($id,Request $request){
        $request->validate([
            'old_password' => 'required|confirmed',
            'new_password' => 'required|confirmed'
        ]);

        $user = User::find($id);
        $user->password = $request->new_password;
        $user->save();
        return redirect('user.index');
    } */



    public function index()
    {

        /*if(!auth()->user()->hasPermissionTo('user list')){
            return "error";
        } */
        $users = User::paginate(20);
        return view('user.index',['users' =>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        $roles = Role::all();
        return view('user.create',['roles' => $roles]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'roles' => 'required|array'
        ]);

        $user = new User;
        // $user->create($request->all());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $user->roles()->attach($request->roles);
        return redirect()->route('user.index')->with('success','oooooooh');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles= Role::all();
        return view('user.edit',['id' => $id , 'user' => $user,'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'roles' => 'required|array'
        ]);


        $user = User::find($id);
        //$user->update($request->all);
        $user->name = $request->name;
        $user->email= $request->email;
        $user->password= bcrypt($request->password);
        $user->save();
        $user->roles()->sync($request->roles);
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id);
        $user->delete();
        return redirect(route('user.index'));

    }
}
