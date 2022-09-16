<div class="media w-50 mb-3"><img src="{{asset('assets/avatar.png')}}" alt="user" width="50" class="rounded-circle">
    <div class="media-body ml-3">
        <div class="bg-light rounded py-2 px-3 mb-2">
            @if($message->attachment != '')
                @if (in_array(pathinfo($message->attachment)['extension'], ['png','jpg','jpeg','gif']))
                    <img src="{{ asset('assets/attachments/' . $message->attachment) }}" alt="{{ $message->attachment }}" width="240">
                @endif

                @if (in_array(pathinfo($message->attachment)['extension'], ['wav','mp3']))
                    <audio controls>
                        <source src="{{ asset('assets/attachments/' . $message->attachment) }}" type="audio/mpeg">
                    </audio>
                @endif

                @if (pathinfo($message->attachment)['extension'] === 'mp4')
                    <video width="240" height="180" controls>
                        <source src="{{ asset('assets/attachments/' . $message->attachment) }}" type="video/mp4">
                    </video>
                @endif
            @endif

            <p class="text-small mb-0 text-muted">{{$message->body}}</p>
        </div>
        <p class="small text-muted">{{$message->user->name}} | {{ $message->created_at->diffForHumans() }}</p>
    </div>
</div>

