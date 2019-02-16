@extends('layouts.front')

@section('headerCss')

<link href="{{ asset('css/chat.css') }}" rel="stylesheet">

@endsection

@section('content')


<!--================Banner Area =================-->
<section class="banner_area profile_banner">
    <div class="profiles_inners">
        <div class="container">
            <div class="profile_content">
                <div class="user_img">
                    @if($user->getMedia('avatars')->isNotEmpty())
                        <img class="img-circle" src="{{$user->getMedia('avatars')->last()->getUrl()}}" height="172" width="172" />
                    @elseif($user->gender == 'Male')
                        <img class="img-circle" src="{{ asset('male_dp.jpeg') }}" alt="">
                    @else
                        <img class="img-circle" src="{{ asset('female_dp.jpeg') }}" alt="">
                    @endif
                </div>
                <div class="user_name">
                    <h3>{{$user->name}}</h3>
                    <h4>@if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->age}} {{  __('home.years_old') }}  @endif &nbsp; </h4>
                    <ul>
                        <!-- <li><a href="#">Frace, Paris</a></li> -->
                        <li class="dropdown extara">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">80% Match</a>
                            <ul class="dropdown-menu">
                               <li>Match</li>
                               <li>
                                <div class="circle1">
                                    <strong></strong>
                                </div>
                                <h4>Match</h4>
                            </li>
                            <li>
                                <div class="circle2">
                                    <strong></strong>
                                </div>
                                <h4>Enemy</h4>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right_side_content">
                                 <!-- <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                      <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Another action</a></li>
                                      </ul>
                                    </li>
                                </ul> -->
                            @if(!empty($currentUser))
                                @if($currentUser->id != $user->id)
                                    @if($currentUser->hasSentFriendRequestTo($user))
                                        <a href="javascript:void(0);" value="LogIn" class="btn form-control login_btn cancel-friend" userid="{{$user->id}}" >{{ __('home.cancel_request') }} <!--<img src="img/user.png" alt="">--></a>
                                    @elseif($currentUser->isFriendWith($user))
                                        <a href="javascript:void(0);" value="LogIn" class="btn form-control login_btn " userid="{{$user->id}}" >{{ __('home.friend') }} <!--<img src="img/user.png" alt="">--></a>
                                    @elseif($currentUser->hasFriendRequestFrom($user))
                                        <a href="javascript:void(0);" value="LogIn" class="btn form-control login_btn approve-request" userid="{{$user->id}}" >{{ __('home.confirm') }} <!--<img src="img/user.png" alt="">--></a>
                                    @else
                                        <a href="javascript:void(0);" value="LogIn" class="btn form-control login_btn add-friend" userid="{{$user->id}}" >{{ __('home.addfriend') }} <!--<img src="img/user.png" alt="">--></a>
                                    @endif
                                    <a href="javascript:void(0);"  class="btn form-control chat-now-btn login_btn" userid="{{$user->id}}">{{__('home.chatnow') }} ({{$unread}}) <!--<img src="img/comment.png" alt="">--></a>
                                @else
                                <a href="/profile" class="btn form-control login_btn "  > {{ __('home.editprofile') }} <img src="img/user.png" alt=""></a>
                                @endif
                            @else
                                <a href="javascript:void(0);" onclick="alert('Please Login'); return;" value="LogIn" class="btn form-control login_btn" userid="{{$user->id}}" > {{ __('home.addfriend') }} <!--<img src="img/user.png" alt="">--></a>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--================End Banner Area =================-->
            
            <!--================Blog grid Area =================-->
            <section class="blog_grid_area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="members_profile_inners">
                                <ul class="nav nav-tabs profile_menu" role="tablist">
                                    <!-- <li role="presentation"><a href="#activity" aria-controls="activity" role="tab" data-toggle="tab">Activity</a></li> -->
                                    <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{ __('home.profile') }}</a></li>
                                    <!-- <li role="presentation"><a href="#sites" aria-controls="sites" role="tab" data-toggle="tab">Sites</a></li> -->
                                    <li role="presentation"><a href="#friend" aria-controls="friend" role="tab" data-toggle="tab"> {{ __('home.friend') }} ({{$user->getFriends()->unique()->count()}})</a></li>
                                    <!-- <li role="presentation"><a href="#group" aria-controls="group" role="tab" data-toggle="tab">Groups (3)</a></li> -->
                                    <!-- <li role="presentation"><a href="#forums" aria-controls="forums" role="tab" data-toggle="tab">Forums</a></li> -->
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active fade in" id="profile">
                                        <div class="profile_list">
                                        <ul>
                                                <li><a href="#">{{ __('home.gender') }}</a></li>
                                                <li><a href="#">{{ __('home.age') }}</a></li>
                                                <li><a href="#">{{ __('home.country') }}</a></li>
                                                <li><a href="#">{{ __('home.city') }}</a></li>
                                                <li><a href="#">{{ __('home.bdy') }}</a></li>
                                                <li><a href="#">{{ __('home.relationship') }}</a></li>
                                                <li><a href="#">{{ __('home.lookingfora') }}</a></li>
                                                <li><a href="#">{{ __('home.workas') }}</a></li>
                                            </ul>
                                            <ul>
                                                <li><a href="#">{{$user->gender}}&nbsp;</a></li>
                                                <li><a href="#">@if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->age}} years old @endif &nbsp;</a></li>
                                                <li><a href="#">{{@$user->profile->country}}&nbsp;</a></li>
                                                <li><a href="#">{{@$user->profile->city}}&nbsp;</a></li>
                                                <li><a href="#">@if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->format('d F Y')}}  @endif&nbsp;</a></li>
                                                <li><a href="#">{{@ucfirst($user->profile->relationship)}}&nbsp;</a></li>
                                                <li><a href="#">{{@$user->profile->looking_for}}&nbsp;</a></li>
                                                <li><a href="#">{{@$user->profile->work_as}}&nbsp;</a></li>
                                            </ul>
                                            <ul>
                                                <li><a href="#">{{ __('home.education') }}</a></li>
                                                <li><a href="#">{{ __('home.know')  }}</a></li>
                                                <li><a href="#">{{ __('home.interest') }}</a></li>
                                                <li><a href="#">{{ __('home.smoking') }}</a></li>
                                                <li><a href="#">{{ __('home.eye_color') }}</a></li>
                                                <li><a href="#">{{ __('home.drinking') }}</a></li>
                                                <li><a href="#">{{ __('home.height') }}</a></li>
                                                <li><a href="#">{{ __('home.weight') }}</a></li>
                                            </ul>
                                            <ul>
                                                <li><a href="#">{{@$user->profile->education}}&nbsp;</a></li>
                                                <li><a href="#">{{@$user->profile->languages}}&nbsp;</a></li>
                                                <li><a href="#">{{@$user->profile->interests}}&nbsp;</a></li>
                                                <li><a href="#">{{@$user->profile->smoking}}&nbsp;</a></li>
                                                <li><a href="#">{{@$user->profile->eye_color}}&nbsp;</a></li>
                                                <li><a href="#">{{@$user->profile->drinking}}</a></li>
                                                <li><a href="#">{{@$user->profile->height}}&nbsp;</a></li>
                                                <li><a href="#">{{@$user->profile->weight}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="friend">
                                        <div class="profile_list">

                                            @if($user->getFriends()->isNotEmpty())
                                            <div class="row member-flex">
                                                @foreach($user->getFriends()->unique() as $friend)
                                                <div class="col-sm-2 col-xs-6">
                                                    <div class="all_members_item">
                                                    <a href="/user/{{$friend->id}}">
                                                        @if($friend->getMedia('avatars')->isNotEmpty())
                                                            <img src="{{$friend->getMedia('avatars')->last()->getUrl()}}" height="172" width="172" />
                                                        @elseif($friend->gender == 'Male')
                                                            <img src="{{ asset('male_dp.jpeg') }}" alt="">
                                                        @else
                                                            <img src="{{ asset('female_dp.jpeg') }}" alt="">
                                                        @endif
                                                        <h4>{{$friend->name}}</h4>
                                                        <h5>@if($friend->dob && !empty($friend->dob)) {{ Carbon\Carbon::parse($friend->dob)->age}}  {{ __('home.years_old') }} @endif &nbsp;</h5>
                                                    </a>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            @else
                                                    <h2>{{ __('home.nofriend') }}</h2>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="group">
                                        <div class="profile_list">
                                            
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="forums">
                                        <div class="profile_list">
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="members_about_box">
                                    <h4>{{ __('home.aboutme') }}</h4>
                                    <p>{{@$user->profile->aboutme}}</p>
                                </div>
                                <div class="members_about_box">
                                    <h4>{{ __('home.lookingfor') }}</h4>
                                    <h5>{{@$user->profile->looking_for}}</h5>
                                    <p>{{@$user->profile->aboutpartner}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="right_sidebar_area">
                                <aside class="s_widget photo_widget">
                                    <div class="s_title">
                                        <h4>{{ __('home.photo') }}</h4>
                                        <img src="img/widget-title-border.png" alt="">
                                    </div>
                                    <ul>
                                    @if($user->getMedia('avatars')->isNotEmpty())
                                        @foreach($user->getMedia('avatars') as $avatars)
                                            <li><a href=""><img src="{{$avatars->getUrl()}}" height="75" width=75 /></a></li>
                                        @endforeach
                                    @endif
                                    </ul>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="chat-wrapper" style="display:none;">
                <div class="chat">
                    <style>
                        .chat-header .img-circle{
                            width:75px;
                            height:75px;
                        }
                    </style>
                  <div class="chat-header clearfix">
                  @if($user->getMedia('avatars')->isNotEmpty())
                        <img class="img-circle" src="{{$user->getMedia('avatars')->last()->getUrl()}}"  />
                    @elseif($user->gender == 'Male')
                        <img class="img-circle" src="{{ asset('male_dp.jpeg') }}" alt="">
                    @else
                        <img class="img-circle" src="{{ asset('female_dp.jpeg') }}" alt="">
                    @endif
                    

                    <div class="chat-about">
                      <div class="chat-with">{{ __('home.chatwith') }} {{$user->name}}</div>
                      <!-- <div class="chat-num-messages">already 0 messages</div> -->
                  </div>
                  <i class="fa fa-star"></i>
              </div> <!-- end chat-header -->

              <div class="chat-history">
                <ul lastmesg="{{$lastMessage}}">
                    <li class="clearfix">
                        <div class="message-data align-right">
                            <span class="message-data-time" >10:10 AM, Today</span> &nbsp; &nbsp;
                            <span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>
                        </div>
                        <div class="message other-message float-right">
                            Hi Vincent, how are you? How is the project coming along?
                        </div>
                    </li>
                    <li>
                        <div class="message-data">
                            <span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
                            <span class="message-data-time">10:12 AM, Today</span>
                        </div>
                        <div class="message my-message">
                            Are we meeting today? Project has been already finished and I have results to show you.
                        </div>
                    </li>

         

<!-- <li>
<div class="message-data">
<span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
<span class="message-data-time">10:31 AM, Today</span>
</div>
<i class="fa fa-circle online"></i>
<i class="fa fa-circle online" style="color: #AED2A6"></i>
<i class="fa fa-circle online" style="color:#DAE9DA"></i>
</li> -->

</ul>
<div id="chat-end"></div>
</div> <!-- end chat-history -->



<div class="chat-message clearfix">
    <form method="post" id="frm-chat-box">
        <textarea name="message-to-send" id="message-to-send" placeholder ="{{  __('home.typemessage') }}" rows="3"></textarea>

        <!-- <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
        <i class="fa fa-file-image-o"></i> -->

        <button type="submit">{{ __('home.send') }}</button>
        <a href="javascript:void(0);" style="float: right;
color: #94C2ED;
font-size: 16px;
text-transform: uppercase;
border: none;
cursor: pointer;
font-weight: bold;
background: #F2F5F8;" class="cancel-chat-pop">{{ __('home.cancel')  }}</a>
    </form>

</div> <!-- end chat-message -->



</div> <!-- end chat -->

</section>
<!--================End Blog grid Area =================-->
@endsection