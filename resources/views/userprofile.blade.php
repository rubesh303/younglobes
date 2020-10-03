@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Profile</div>
				
					
                <div class="card-body">
					<img src="{{ url('/public/uploads/Tulips.jpg')  }}" height="200px"width="200px">
				<p>Name:{{ $userProfile->name }}</p>
				<p>Email:{{ $userProfile->email }}</p>
				<p>Gender :{{ $userProfile->gender }}</p>
				<p>Country :{{ $userProfile->country }}</p>
				<p>Designation:{{ $userProfile->designation }}</p>
				<p>Date Of Birth:{{ $userProfile->dob }}</p>
				<p>Age:{{ $userProfile->age }}</p>
				<p>Favourite Actor:{{ $userProfile->fav_actor }}</p>
                <a href="{{ route('addFriend',$userProfile->id) }}"class="btn btn-primary">Add Friend</a>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')



@endsection
@endsection
