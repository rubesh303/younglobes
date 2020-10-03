@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('UserRegister') }}"enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Gender</label>

                            <div class="col-md-6">
                               <div class="radio">
						<label><input type="radio" name="gender"value="Male" checked>Male</label>
							</div>
							<div class="radio">
							<label><input type="radio" name="gender"value="Female">Female</label>
							</div>
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Date Of Birth</label>

                            <div class="col-md-6">
                              <input type="date"name="dob"class="form-control">
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Age:</label>

                            <div class="col-md-6">
                              <input type="text"name="age"class="form-control">
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Designation</label>

                            <div class="col-md-6">
                              <input type="text"name="designation"class="form-control">
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Profile Photo</label>

                            <div class="col-md-6">
                               <div class="radio">
							<input type="file" name="photo">
							</div>
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Country</label>

                            <div class="col-md-6">
                               <select name="country"class="form-control">
							   <option value="India">India</option>
							   <option value="USA">USA</option>
							   <option value="Japan">Japan</option>
							   <option value="Australia">Australia</option>
							   </select>
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Favourite Colour</label>

                            <div class="col-md-6">
                              <input type="color"name="fav_color"class="form-control">
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Favourite Actor</label>

                            <div class="col-md-6">
                              <input type="text"name="fav_actor"class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
