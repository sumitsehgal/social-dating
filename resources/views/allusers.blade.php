@extends('layouts.front')

@section('content')
<div class="container">
<!--================All Members Area =================-->
<section class="all_members_area">
    <div class="container">
        <div class="welcome_title">
            <h3>All Members</h3>
            <img src="img/w-title-b.png" alt="">
        </div>
        <div class="row member-flex">
            @if($allUsers->isNotEmpty())
                @foreach($allUsers as $user)
                    <div class="col-sm-2 col-xs-6">
                        <div class="all_members_item">
                            @if($user->gender == 'Male')
                                <img src="{{ asset('male_dp.jpeg') }}" alt="">
                            @else
                                <img src="{{ asset('female_dp.jpeg') }}" alt="">
                            @endif
                            <h4>{{$user->name}}</h4>
                            <h5>@if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->age}}  @endif years old</h5>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        {{$allUsers->onEachSide(5)->links()}}
    </div>
</section>
<!--================End All Members Area =================-->

</div>
@endsection