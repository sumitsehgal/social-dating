@extends('layouts.front')

@section('content')

<section class="find_soul_area">
            <div class="container">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
                <div class="welcome_title">
                    <h3>Membership</h3>
                    <img src="{{ asset('img/w-title-b.png') }}" alt="">
                </div>
                <div class="row">
                    @if($plans->isNotEmpty())
                        @foreach($plans as $plan)
                            <div class="col-md-3">
                                <div class="find_soul_item">
                                    <img src="{{ asset('img/soul-icon/soul-1.png') }}" alt="">
                                    <h4>{{$plan->title}}</h4>
                                    <p>{{$plan->description}}</p>
                                    <p>{{$plan->scope}}</p>
                                    <a href="/membership/upgrade/{{$plan->stripe_plan_id}}">Subscribe Now</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>

@endsection