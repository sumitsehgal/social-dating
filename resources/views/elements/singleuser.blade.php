@if($allUsers->isNotEmpty())
    @foreach($allUsers as $user)
        <div class="col-sm-2 col-xs-6">
            <div class="all_members_item">
            <a href="/user/{{$user->id}}">
                @if($user->getMedia('avatars')->isNotEmpty())
                    <img  src="{{$user->getMedia('avatars')->last()->getUrl()}}" />
                @elseif($user->gender == 'Male')
                    <img src="{{ asset('male_dp.jpeg') }}" alt="">
                @else
                    <img src="{{ asset('female_dp.jpeg') }}" alt="">
                @endif
                <h4>{{$user->name}}</h4>
                <h5>@if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->age}}  @endif years old</h5>
                </a>
            </div>
        </div>
    @endforeach
@endif