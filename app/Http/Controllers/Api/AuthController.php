<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ResetMail;
use App\Models\Client;
use App\Models\Token;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule as ValidationRule;

class AuthController extends Controller{


    //register
    public function register(Request $request){

            $rules =array(
            "name" => "required|max:90",
            "phone" =>"required",
            "email" => "required",
            "password" => "required",
            "d_o_b" => "required",
            "blood_type" => "required|in:A+,A-,O+,O-"
            );

            $validator = FacadesValidator::make($request->all(),$rules);

            if($validator->fails()) {
            return $validator->errors();
            }


            else{
            $client = new Client();
            $client->name = $request->name;
            $client->phone = $request->phone;
            $client->email = $request->email;
            $client->password = bcrypt($request->password);
            $client->d_o_b = $request->d_o_b;
            $client->blood_type= $request->blood_type;
            $client->city_id = $request->city_id;
            $client->api_token = Str::random(50);
            $client->save();
            }

            return ApiResponse(1,"success",[
                "api_token" => $client->api_token,
                "client" => $client
            ]);

    }

    //login
    public function login(Request $request){

        $rules =array(
        "phone" =>"required",
        "password" => "required",
        );

        $validator = FacadesValidator::make($request->all(),$rules);

        if($validator->fails()) {
        return $validator->errors();
        }


         $client = Client::where('phone' , $request->phone)->first();
            if($client){

                if(bcrypt($request->password) == $client->password)
                {
                return ApiResponse(1,"هذا المستخدم موجود ",['api_token' => $client->api_token , 'client' => $client]);

                }else{
                return ApiResponse(5,"كلمة المرور خاطئة ",["password" => "false"]);
                }

            }else{
            return ApiResponse(5,"هذا المستخدم غير  موجود ",$client)  ;
            }
    }

    //forgetpassword
    public function forgetpassword(Request $request){


        if($request->phone){

          $client = Client::where('phone',$request->phone)->first() ;
            if($client){
                $code =rand(11111,99999);
                $client->pin_code = $code;
                $client->save();
                Mail::to($client->email)->send(new ResetMail($code));
                return ApiResponse(1,"success",["code" => $code , "email" => $client->email]);

            }else
            {return ApiResponse(5,"phone is not correct",["data" => "null"]);}

        }else{
        return ApiResponse(5,"enter your phone number",["data" => "null"]);}

     }

        //resetpassword
        public function resetpassword(Request $request) {
            $rules = [
                'code' =>  'required',
                'phone' => 'required',
                'password' =>'required'
            ];

            $validator = FacadesValidator::make($request->all() , $rules);
            if ($validator->fails()){
                $errors = $validator->errors();
                return ApiResponse(5,$errors->first(),$errors);
            }

            $client = Client::where('phone' , $request->phone)
                            ->where('pin_code' , $request->code)->first();

            if($client){
                $client->password = bcrypt($request->password);
                $client->pin_code = null;
                $client->save();
                return ApiResponse(1,"تم تغيير كلمة المرور بنجاح " , ['new' => $client->password]);
            }else{return ApiResponse(5,"فيه غلط ف الداتا ", ['data'=>'false']);}
        }



     //editprofile
     public function editprofile(Request $request){


        $rules = [
            'email' => 'required',
            'phone' => 'required'
          //  'email' => ValidationRule::unique('clients')->ignore($request->user()->id),
           // 'phone' => ValidationRule::unique('clients')->ignore($request->user()->id)
        ];

        $validation = FacadesValidator::make($request->all(),$rules);

        if($validation->fails()){
            $data = $validation->errors();
            return ApiResponse(5,$validation->errors()->first(),$data);
        }

        $loginUser= $request->user();
        $loginUser->update($request->all());


        if($request->has('city_id')){
            $loginUser->cities()->detach();
            $loginUser->cities()->attach($request->city_id);
        }

        return ApiResponse(1,"success", ["user" => $loginUser]);


     }


     public function registertoken(Request $request){

        $rules = [
            'token' => 'required',
            'client_id' => 'required',
            'device' => 'in:ios,android'
        ];

        $validator = FacadesValidator::make($request,$rules);

        if($validator->fails()){
            $errors= $validator->errors();
            return ApiResponse(5,$errors->first(),$errors);
        }

        Token::where('token',$request->token)->delete();
        $request->user()->tokens()->create($request->all());
        return ApiResponse(1,'success',$request->user()->tokens);

     }

     public function removetoken(Request $request) {

         $rules = [
             'token' => 'required'
         ] ;

         $validator = FacadesValidator::make($request , $rules);
         if($validator->fails()){
             $errors = $validator->errors();
             return ApiResponse(5, $errors->first(),$errors);
         }

         Token::where('token', $request->token)->delete();
         return ApiResponse(1, 'success', 'token is deleted');

     }


}
