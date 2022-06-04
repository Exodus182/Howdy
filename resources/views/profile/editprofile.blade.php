@extends('layouts.app')

@section('title', __('Edit Profile'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('profile') }}">Profile</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                </ol>
              </nav>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">          
                        <h4><i class="fa fa-user"></i> My Profile</h4>
                        <form method="POST" action="{{ url('profile') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="phone_number" class="col-md-2 col-form-label text-md-end">{{ __('Phone') }}</label>
    
                                <div class="col-md-6">
                                    <input id="phone_number" type="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user->phone_number }}" required autocomplete="phone">
    
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="address" class="col-md-2 col-form-label text-md-end">{{ __('Address') }}</label>
                                <div class="col-md-6">
                                    <textarea name="address" id="address" cols="30" rows="3" class="form-control @error('address') is-invalid @enderror" required autocomplete="address">
                                        {{ $user->address }}
                                    </textarea>
                                </div>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection