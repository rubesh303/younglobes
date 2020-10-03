@extends('layouts.app')

@section('content')
<style>
.profile_details {
    border: 1px solid #ecd7d7;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
					 <div class="row">
					 <div class="col-md-4">
					<form action="{{ route('search') }}"method="get">
					
					 <div class="form-group">
					<label for="email">Search:</label>
					<input type="text" class="form-control"placeholder="Search By Name" name="user_name"id="user_name">
					</div>
					
						
					<input type="submit"name="search" class="btn btn-success"value="Search">
					
					</form>
					</div>
					
					</div>
                <div class="card-body">
				
					@foreach($users as $key=>$user)
					<div class="profile_details"style="border: 1px solid #e6cfcf;">
						<p><a href="{{ route('viewProfile',$user['id']) }}">
						
						<img src="{{ url($user['photo']) }}" height="50px"width="50px"></a>
						@if($user['friend_status']) 
						<a href="{{ route('calcelFriend',$user['id']) }}" style="float:right" class="btn btn-danger CancelFriend"id="{{ $user['id'] }}">Cancel Friend</a>
						
						@else
						<a href="{{ route('addFriend',$user['id']) }}"  style="float:right" class="btn btn-primary AddFriend"id="{{ $user['id'] }}">Add Friend</a>
							
						@endif
						</p>
						<p><b>Name:</b> {{ $user['name'] }} </p>
						<p><b>Designation:</b> {{$user['designation']}}</p> 
						<div class="requets_button">
						
						</div>
						</div>
					@endforeach

                   
                
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')

<script>
$(".AddFriend").click(function(){
  alert("The paragraph was clicked.");
});
</script>

@endsection
@endsection
