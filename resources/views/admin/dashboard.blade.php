@extends('layouts.admin')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-3">
                            <a href="/admin/users/all" class="card-panel">
                                <h6 class="count">{{$users->total()}}</h6>
                                <h3 class="dashboar-lbl">Total User</h3>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="/admin/users/online" class="card-panel">
                                <h6 class="count">{{ $onlineMale + $onlineFemale }}</h6>
                                <h3 class="dashboar-lbl">Online User</h3>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="/admin/users/male" class="card-panel">
                                <h6 class="count">{{$onlineMale}}</h6>
                                <h3 class="dashboar-lbl">Online Male</h3>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="/admin/users/female" class="card-panel">
                                <h6 class="count">{{$onlineFemale}}</h6>
                                <h3 class="dashboar-lbl">Online Female</h3>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection