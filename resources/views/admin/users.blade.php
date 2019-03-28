@extends('layouts.admin')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <td>Avatar</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Gender</td>
                            <td>DOB</td>
                            <td>Status</td>
                            <td>Plans</td>
                        </thead>
                        <tbody>
                            @if($users->isNotEmpty())
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    @if($user->getMedia('avatars')->isNotEmpty())
                                        <img class="img-circle" src="{{$user->getMedia('avatars')->last()->getUrl()}}" height="172" width="172" />
                                    @elseif($user->gender == 'Male')
                                        <img class="img-circle" src="{{ asset('male_dp.jpeg') }}" alt="">
                                    @else
                                        <img class="img-circle" src="{{ asset('female_dp.jpeg') }}" alt="">
                                    @endif
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{ ucfirst($user->gender) }}</td>
                                <td>@if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->age}} years  @endif</td>
                                <td>@if($user->isOnline()) Onlilne @else Offline @endif </td>
                                <td>
                                    @if( $user->subscribed('Starter') ||  $user->subscribed('Ultimate'))
                                        @if($user->subscribed('Starter')) 
                                            Starter
                                        @endif   
                                        @if($user->subscribed('Ultimate')) 
                                            - Ultimate 
                                        @endif
                                    @else
                                        No Plan
                                    @endif
                                    </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection