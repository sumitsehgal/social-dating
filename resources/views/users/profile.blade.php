@extends('layouts.front')

@section('headerCss')

<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

@endsection

@section('content')

<section class="my-profile">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-wrapper">
                    <h4>My Profile</h4>
                    <form action="/profile-post" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="profile-form">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email" readonly value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Full Name" value="{{$user->name}}" name="name">
                            </div>
                            <!-- <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Username">
                            </div> -->
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Height" name="height" value="{{@$user->profile->height}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Weight" name="weight" value="{{@$user->profile->weight}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control datetime"  placeholder="DOB" name="dob" value="@if(!empty($user->dob)) {{ $user->dob->format('m/d/Y') }} @endif">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Country" name="country" value="{{@$user->profile->country}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="City" name="city" value="{{@$user->profile->city}}">
                            </div>
                            <div class="form-group">
                                <select name="relationship" class="form-control">
                                    <option value="">Select Relationship</option>
                                    @if(!empty(App\Profile::RELATIONSHIPS))
                                        @foreach(App\Profile::RELATIONSHIPS as $key => $relation)
                                            <option value="{{$key}}" @if($key == @$user->profile->relationship) selected="selected" @endif >{{$relation}}</option>
                                        @endforeach
                                    @endif
                                </select>                                
                            </div>
                            <div class="form-group">
                                <select name="looking_for" class="form-control">
                                    <option value="">Looking For</option>
                                    @if(!empty(App\Profile::LOOKING_FOR))
                                        @foreach(App\Profile::LOOKING_FOR as $key => $relation)
                                            <option value="{{$key}}" @if($key == @$user->profile->looking_for) selected="selected" @endif >{{$relation}}</option>
                                        @endforeach
                                    @endif
                                </select> 
                            </div>
                            <!-- <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Interests">
                            </div> -->
                            <div class="form-group">
                                <select name="smoking" class="form-control">
                                    <option value="">Do you Smoke ?</option>
                                    @if(!empty(App\Profile::IS_SMOKING))
                                        @foreach(App\Profile::IS_SMOKING as $key => $relation)
                                            <option value="{{$key}}" @if($key == @$user->profile->smoking) selected="selected" @endif >{{$relation}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="drinking" class="form-control">
                                    <option value="">Do you Drink ?</option>
                                    @if(!empty(App\Profile::IS_DRINKING))
                                        @foreach(App\Profile::IS_DRINKING as $key => $relation)
                                            <option value="{{$key}}" @if($key == @$user->profile->drinking) selected="selected" @endif>{{$relation}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Language" name="languages" value="{{@$user->profile->languages}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Work As" name="work_as" value="{{@$user->profile->work_as}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Education" name="education" value="{{@$user->profile->education}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Interst" name="interests" value="{{@$user->profile->interests}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Eye Color" name="eye_color" value="{{@$user->profile->eye_color}}">
                            </div>
                            <div class="form-group textarea">
                                <textarea placeholder="About" name="aboutme">{{ @$user->profile->aboutme }}</textarea>
                            </div>
                            <div class="form-group textarea">
                                <textarea placeholder="Looking For" name="aboutpartner">{{ @$user->profile->aboutpartner }}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" name="file">
                                @if($user->getMedia('avatars')->isNotEmpty())
                                    <img src="{{$user->getMedia('avatars')->last()->getUrl()}}" height="200" width="200" />
                                @elseif($user->gender == 'Male')
                                    <img src="{{ asset('male_dp.jpeg') }}" alt="">
                                @else
                                    <img src="{{ asset('female_dp.jpeg') }}" alt="">
                                @endif
                            </div>
                            <div class="form-group button">
                                <button type="submit" value="LogIn" class="btn form-control login_btn">Submit</button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection