<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\Client;
use App\Models\ClientPost;
use App\Models\Token;
use App\Models\DonationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class MainController extends Controller{



    Public function governrates() {
        $governrates = Governorate::all();
       return ApiResponse(1,'success',$governrates);
    }

    Public function cities(Request $request) {
        $cities = City::where('governorate_id',$request->governorate_id)->get();
       return ApiResponse(1,'success',$cities);
    }

    Public function posts(Request $request) {
        $posts = Post::all();
       return ApiResponse(1,'success',$posts);
    }


    public function favposts(Request $request){
        if($request->post_id){
        $request->user()->posts()->toggle($request->post_id);
        return ApiResponse(1,"success", $request->user()->posts);
        }

        else{return ApiResponse(5,'false', ['error'=>'there is no post_id']); }
    }

    public function createdonation(Request $request){
        $rules = [
            'patient_name' => 'required',
            'patient_age' => 'required:digits',
            'blood_type_id' => 'required|exists:blood_types,id',
            'bags_num' => 'required:digits',
            'hospital_address' => 'required',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required|digits:11',
        ];
        $validator = FacadesValidator::make($request , $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return ApiResponse(5,$errors()->first(),$errors);
        }

        $donationRequest = $request->user()->donation_requests->create($request->all());

        $clientsID = $donationRequest->city->governrate->clients()->whereHas('blood_types',function($q){
            $q->where('blood_types.id' , 'blood_type_id');
        })->pluck('clients.id')->toArray();


        if(count($clientsID)){
        $notification = $donationRequest->notifications()->create([
            'title' => 'يوجد حالة تبرع قريبة منك',
            'content' => optional($donationRequest->bloodType)->name . 'محتاج متبرع لفصيلة '
            ]);


        $notification->clients()->attach($clientsID);

        $tokens = Token::whereIn('client_id','clientsID')->pluck('token')->toArray();

            if(count($tokens)){
              $title = $notification->title;
                $body = $notification->content;
                $data = [
                    'donation_request_id' => $donationRequest->id
                ];
                $send = notifyByFirebase($title, $body, $tokens, $data);
                info("firebase result: " . $send);
             }

             return ApiResponse(1,'there are clients',Client::whereIn('client_id',$clientsID));

        }




    }

}
