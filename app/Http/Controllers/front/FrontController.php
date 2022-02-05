<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\DonationRequest;
use App\Models\Post;
use App\Models\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FrontController extends Controller
{
    public function index(){
        $posts = Post::latest()->take(8)->get();
        $bloods= BloodType::all();
        $cities = City::all();
        $donations = DonationRequest::latest()->take(3)->get();
        return view('front.index',compact('posts','bloods','cities','donations'));
    }

    public function indexLtr(){
        $posts = Post::latest()->take(8)->get();
        $bloods= BloodType::all();
        $cities = City::all();
        $donations = DonationRequest::latest()->take(3)->get();
        return view('front.index-ltr',compact('posts','bloods','cities','donations'));
    }

    public function articleDetails(){
        return view('front.article-details');
    }

    public function articleDetailsLtr(){
        return view('front.article-details-ltr');
    }

    public function contactUs(){
        return view('front.contact-us');
    }

    public function contactUsLtr(){
        return view('front.contact-us-ltr');
    }

    public function donationRequests(Request $request){
        $donations = DonationRequest::where(function($query) use($request){
            if($request->blood_type_id){
                $query->where('blood_type_id',$request->blood_type_id);
            }
            if($request->city_id){
                $query->where('city_id',$request->city_id);
            }
        })->paginate(2);
        return view('front.donation-requests',compact('donations'));
    }

    public function donationRequestsLtr(){
        return view('front.donation-requests-ltr');
    }

    public function insideRequest(){
        return view('front.inside-request');
    }

    public function insideRequestLtr(){
        return view('front.inside-request-ltr');
    }

    public function signinAccount(){
        return view('front.signin-account');
    }

    public function signinAccountLtr(){
        return view('front.signin-account-ltr');
    }

    public function whoAreUs(){
        return view('front.who-are-us');
    }

    public function whoAreUsLtr(){
        return view('front.who-are-us-ltr');
    }

    public function createAccount(){
        return view('front.create-account');
    }

    public function createAccountLtr(){
        return view('front.create-account-ltr');
    }


    public function search(Request $request){
        $request->validate([
            'city_id' => 'required',
            'blood_type_id'=>'required'
        ]);

        $donations = DonationRequest::where('city_id',$request->city_id)->where('blood_type_id',$request->blood_type_id);
        return ApiResponse(1,'success',$donations);
     }


     public function donationCreate(){

        return view('front.donation-create');
     }


     public function donationStore(Request $request){
        $request->validate([
            'patient_name' => 'required',
            'patient_phone' => 'required',
            'patient_age' => 'required',
            'hospital_name' => 'required',
            'hospital_address' => 'required',
            'city_id' => 'required',
            'blood_type_id' => 'required',
            'bags_num' => 'required',

        ]);
        // dd( $request->user()->id);

        $donation = DonationRequest::create($request->all());
        $donation->client_id = $request->user()->id ;
        $donation->save();

        return redirect(route('donationRequests'));

     }


}
