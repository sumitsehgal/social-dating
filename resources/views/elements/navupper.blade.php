@if($cs->isNotEmpty())
    @foreach($cs as $s)
        <?php $urd = Chat::conversation($s)->for(auth()->user())->unreadCount();  ?>
        @if($urd > 0)
        <?php $frd = $s->users()->where('id', '!=', auth()->user()->id)->first(); ?>
        <a class="user-msg-link" class="dropdown-item" href="/user/{{$frd->id}}"><i class="fa fa-user-o" aria-hidden="true"></i>
            {{ $frd->name }} ({{$urd}})
        </a>
        @endif
    @endforeach
@endif