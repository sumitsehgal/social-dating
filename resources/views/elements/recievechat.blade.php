
@if($messages->isNotEmpty())
    @foreach($messages as $message)
        @if(auth()->user()->id == $message->user_id)
            <!-- <li class="clearfix">
                <div class="message-data align-right">
                    <span class="message-data-time" >{{ $message->created_at->diffForHumans() }}</span> &nbsp; &nbsp;
                    <span class="message-data-name" >{{ $message->sender->name }}</span> <i class="fa fa-circle me"></i>
                </div>
                <div class="message other-message float-right">
                    {{$message->body}}
                </div>
            </li> -->
        @else
            <li id="msg-{{$message->id}}">
                <div class="message-data">
                    <span class="message-data-name"><i class="fa fa-circle online"></i> {{ $message->sender->name }}</span>
                    <span class="message-data-time">{{ $message->created_at->diffForHumans() }}</span>
                </div>
                <div class="message my-message">
                    {{$message->body}}
                </div>
            </li>
        @endif
    @endforeach
@endif