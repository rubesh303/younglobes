@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Matches</div>
				
					
                <div class="card-body">
					@foreach($users as $key=>$list)
					<?php	 $totalsum = $list['colourcount'] +  $list['actorcount'] + $list['countrycount'] + $list['agecount'] ?>
					@if($totalsum > 1)
					<div class="profile_details"style="border: 1px solid #e6cfcf;">
						<p><a href="{{ route('viewProfile',$list['id']) }}">
						
						<img src="{{ url($list['photo']) }}" height="50px"width="50px"></a>
						@if($list['friend_status']) 
						<a href="{{ route('calcelFriend',$list['id']) }}" style="float:right" class="btn btn-danger CancelFriend"id="{{ $list['id'] }}">Cancel Friend</a>
						
						@else
						<a href="{{ route('addFriend',$list['id']) }}"  style="float:right" class="btn btn-primary AddFriend"id="{{ $list['id'] }}">Add Friend</a>
							
						@endif
						</p>
						<p><b>Name:</b> {{ $list['name'] }} </p>
						<p><b>Designation:</b> {{$list['designation']}}</p> 
						<div class="requets_button">
						
						</div>
						</div>
					@endif
					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')



@endsection
@endsection
