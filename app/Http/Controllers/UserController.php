<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Friend;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use File;
class UserController extends Controller
{
   public function register(request $request){
	   // return $request->all();
	   $image ="";
        if (isset($request->photo)) {
            $files = $request->file('photo');
            $image = '/public/uploads/'.$files->getClientOriginalName();
            $files->move(public_path().'/uploads/',$image);
        }
	    User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'dob' => $request->dob,
            'age' => $request->age,
            'designation' => $request->designation,
            'photo' => $image,
            'country' => $request->country,
            'fav_color' => $request->fav_color,
            'fav_actor' => $request->fav_actor, 
        ]);
		 $userCredentials = $request->only('email', 'password');

        // check user using auth function
        if (Auth::attempt($userCredentials)) {
            return redirect()->intended('home');
        }
   }
   public function viewProfile(request $request){
	 
	   $data['userProfile']=User::where('id',$request->id)->get()->first();
	    return view('userprofile',$data);
   }
   public function search(request $request){
	  
	   $data['users'] =	User::where([['id','!=',auth()->user()->id],['name','like',$request->user_name]])
						->orderBy('created_at', 'desc') 
						->get();
	   return view('home',$data);
   }
   public function addFriend(request $request){
	
	$Friend = new Friend;
	$Friend->requester_id =auth()->user()->id;
	$Friend->user_id = $request->id;
	$Friend->save();
	return redirect()->intended('home');
   }
   public function calcelFriend(request $request){
	   // echo $request->id;
	   $data['userProfile']=Friend::where([['user_id',$request->id],['requester_id',auth()->user()->id]])->get()->first();
	  
	    $Years = Friend::findorfail($data['userProfile']->id)->delete();
		return redirect()->intended('home');
   }
   public function Matches(){
	
	   $data['users'] = User::where('id','!=',auth()->user()->id)->get()->toArray();
	   foreach($data['users'] as $key=>$value){
		    $user_id= $value['id']; 
			$data['users'][$key]['friend_status']=Friend::where('user_id',$user_id)->get()->toArray();
			$data['users'][$key]['colourcount']= User::where([['fav_color',auth()->user()->fav_color],['id',$user_id]])->get()->count();
			$data['users'][$key]['actorcount']= User::where([['fav_actor',auth()->user()->fav_actor],['id',$user_id]])->get()->count();
			$data['users'][$key]['countrycount']= User::where([['country',auth()->user()->country],['id',$user_id]])->get()->count();
			$data['users'][$key]['agecount']= User::where([['age',auth()->user()->age],['id',$user_id]])->get()->count();
	   }
	   // echo "<pre>";
	   // print_r($data['users']);
	  
	    return view('matches',$data);
   }
}
