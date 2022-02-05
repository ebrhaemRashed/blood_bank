<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;


class ClientAuthController extends Controller
{

    public function showlog(){
        return view('client.login');
    }

    public function clientLogin(Request $request){

        $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);

        if(auth('client')->attempt($request->only('phone','password')))
        {

           return redirect()->route('client-index');
        }

        else
        {
            return 'data is not correct';
        }



   }

   public function clientRegister(Request $request){
    $request->validate([
        'name' => 'required',
        'phone'  => 'required',
        'email'  => 'required',
        'password'  => 'required|confirmed',
        'd_o_b'  => 'required',
        'blood_type'  => 'required',
        'city_id' =>'required'
    ]);

    $newClient= new Client; //or newClient= new Client;
    $newClient->name = $request->name;
    $newClient->phone=$request->phone;
    $newClient->email=$request->email;
    $newClient->d_o_b=$request->d_o_b;
    $newClient->blood_type=$request->blood_type;
    $newClient->password = bcrypt($request->password);
    $newClient->city_id=$request->city_id;
    $newClient->save();
    return redirect()->route('signin-account');
   }


// auth('client')->check($request->only('phone','password'))
// true - false
//auth('client')->loginUsingId($client->id);
//auth()->login($client);




            public function logout()
            {
                auth('client')->logout();
                return redirect(route('signin-account'));
            }


}
