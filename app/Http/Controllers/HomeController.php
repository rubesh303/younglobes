<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Friend;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {	
		$data['users']=	User::where('id','!=',auth()->user()->id)
						->orderBy('created_at', 'desc')
						->get()->toArray();
		$data['actors']=	User::groupBy('fav_actor')->pluck('fav_actor');
		// print_r($data['actors']);
		foreach($data['users'] as $key=>$value){
			$id=$value['id'];
			$data['users'][$key]['friend_status']=Friend::where('user_id',$id)->get()->toArray();
		}
		// echo "<pre>";
		// print_r($data);
        return view('home',$data);
    }
}
