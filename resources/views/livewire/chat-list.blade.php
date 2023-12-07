<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <div class="chatlist_header">

        <div class="title">
            Чат
        </div>

        <div class="img_container">
            <img src="{{ auth()->user()->avatar }}" style="border-radius: 50%;" alt="">
        </div>
    </div>

    <div class="chatlist_body">
        @if (count($conversations) > 0)
          @foreach ($conversations as $conversation)
                <div class="chatlist_item" wire:click="$emit('chatUserSelected', {{$conversation}}, {{$this->getChatUserInstance($conversation, $name = 'id') }})">
                    <div class="chatlist_img_container">

                        <img src="https://ui-avatars.com/api/?name={{$this->getUserPhoto($conversation, $name = 'name')}}&background=104772&color=fff&size=50"
                            alt="">
                    </div>

                    <div class="chatlist_info">
                        <div class="top_row">
                            <div class="list_username">
                                {{$this->getUserPhoto($conversation, $name = 'name')}}
                            </div>
                            <span class="date">
                                {{ $conversation->messages->last()?->created_at->shortAbsoluteDiffForHumans() }}</span>
                        </div>

                        <div class="bottom_row">

                            <div class="message_body text-truncate">
                                @if($conversation->messages->last() != null)
                                {{ $conversation->messages->last()->body }}
                                @endif
                            </div>
                 
                            @php
                                if(count($conversation->messages->where('read',0)->where('receiver_id',Auth()->user()->id))){

                             echo ' <div class="unread_count badge rounded-pill text-light bg-danger">  '
                                 . count($conversation->messages->where('read',0)->where('receiver_id',Auth()->user()->id)) .'</div> ';

                                }

                            @endphp

                        </div>
                    </div>
                </div>
                @endforeach
                @endif
    </div>


</div>