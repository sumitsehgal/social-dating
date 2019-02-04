<li class="clearfix" id="msg-{{$message->id}}">
    <div class="message-data align-right">
        <span class="message-data-time" >{{ $message->created_at->diffForHumans() }}</span> &nbsp; &nbsp;
        <span class="message-data-name" >{{ $message->sender->name }}</span> <i class="fa fa-circle me"></i>
    </div>
    <div class="message other-message float-right">
        {{$message->body}}
    </div>
</li>