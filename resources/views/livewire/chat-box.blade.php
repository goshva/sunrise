<div>
    {{-- Stop trying to control. --}}

    @if ($selectedConversation)
    
        <div class="chatbox_header">
           <div class="chatbox_header_go_back return">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6189 18.5172C15.2135 18.8479 14.6162 18.8243 14.2379 18.4463L8.39586 12.604C8.20002 12.4081 8.09401 12.1461 8.09401 11.8744C8.09401 11.6025 8.19984 11.341 8.39586 11.1444L14.238 5.3023C14.6415 4.89923 15.2947 4.89923 15.6972 5.3023C16.1009 5.70551 16.1009 6.35889 15.6973 6.76188L10.5853 11.8744L15.6972 16.9867C16.0757 17.3647 16.0993 17.9626 15.7682 18.368L15.6973 18.4464L15.6189 18.5172Z" fill="#343A40"/>
                </svg>
           </div>
                
            

            <div class="img_container">
                <img src="{{ $receiverInstance->avatar }}" alt="">

            </div>


            <div class="name">
                {{ $this->receiverInstance->first_name. " " . $this->receiverInstance->last_name }}
            </div>


            <div class="info">

            </div>
        </div>

        <div class="chatbox_body">
            @foreach ($messages as $message)
                <div class="msg_body  {{ auth()->id() == $message->sender_id ? 'msg_body_me' : 'msg_body_receiver' }}"
                    style="width:80%;max-width:80%;max-width:max-content">
                    @if ($message->type == 'image')
                      <a href="{{ $message->body }}" target="_blank">
                        <img src="{{ $message->body }}" alt="" class="chat_image">
                      </a>
                    @elseif ($message->type == null || $message->type =="text")
                   <span class="message_body"> {{ $message->body }}</span>
                   @elseif ($message->type == 'file')
                      <a href="{{ $message->body }}" download style="display: flex;flex-direction:column-reverse">
                        Скачать
                        <img src="https://www.iconpacks.net/icons/2/free-file-icon-1453-thumb.png" alt="" class="chat_image">
                      </a>
                      @elseif ($message->type == 'video')
                      <video style="width: 150px; height:120px" controls src="{{ $message->body }}" ></video>
                   @endif

                    <div class="msg_body_footer">
                        <div class="date">
                            {{ $message->created_at->format('H:i') }}
                        </div>

                        <div class="read">
                            
                            @php
                                
                          if($message->user->id === auth()->id()){

                
                                    if($message->read == 0){


                                        echo'<i class="bi bi-check2 status_tick "></i> ';
                                    }
                                    else {
                                        echo'<i class="bi bi-check2-all text-primary  "></i> ';
                                    }

                          }


                            @endphp
                      

                        </div>
                    </div>
                </div>
            @endforeach
                
        </div>
        


        <x-footer></x-footer>
        <script>
            $(".chatbox_body").on('scroll', function() {
                // alert('aahsd');
                var top = $('.chatbox_body').scrollTop();
                //   alert('aasd');
                if (top == 0) {

                    window.livewire.emit('loadmore');
                }

            });
        </script>


        <script>
           window.addEventListener('updatedHeight', event => {

let old = event.detail.height;
let newHeight = $('.chatbox_body')[0].scrollHeight;

let height = $('.chatbox_body').scrollTop(newHeight - old);


window.livewire.emit('updateHeight', {
    height: height,
});


});
        </script>
    @else
        <div class="fs-4 text-center text-primary mt-5">
            Выберите чат
        </div>




    @endif


    <script>
 


        window.addEventListener('rowChatToBottom', event => {

            $('.chatbox_body').scrollTop($('.chatbox_body')[0].scrollHeight);

        });
    </script>

<script>

</script>
 

<script>

window.addEventListener('markMessageAsRead',event=>{
 var value= document.querySelectorAll('.status_tick');

 value.array.forEach(element, index => {
     

    element.classList.remove('bi bi-check2');
    element.classList.add('bi bi-check2-all','text-primary');
 });

});

</script>
	<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script>
const authEndpoint = '{{env("APP_URL")}}/api/pusher/auth' // The URL of your authentication endpoint

    const pusher = new Pusher('7d3d27f371b1f7bf57d0', {
  cluster: 'ap2',
  authEndpoint: authEndpoint, // The URL where the authentication endpoint is defined
  auth: {
    headers: {
      'X-CSRF-Token': 'YOUR_CSRF_TOKEN', // Include CSRF token if required by your Laravel app
    },
  },
});
pusher.connection.bind('connected', function () {
  localStorage.setItem('socket_id',pusher.connection.socket_id);
  // Use the socket ID as needed for authentication
});
const csrfToken = '{{ csrf_token() }}'; // Replace with your actual CSRF token
const channelName = 'private-chat.{{ auth()->id() }}'; // Replace with the socket ID generated by Pusher

// Prepare the authentication data
const authData = {
  _token: csrfToken,
//   email:"studio@gmail.com",
//   password:"studio",
  channel_name: channelName,
  socket_id: localStorage.getItem('socket_id'),
};

// Send the POST request to the authentication endpoint
fetch(authEndpoint, {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
    'X-CSRF-Token': csrfToken,
  },
  body: JSON.stringify(authData),
})
  .then((response) => {
    if (response.ok) {
      // Authentication successful
      return response.json();
    } else {
      // Authentication failed
      throw new Error('Failed to authenticate');
    }
  })
  .then((authResponse) => {
    // Use the authResponse as needed (e.g., authorization token)
    console.log('Authentication successful:', authResponse);
    var channel = pusher.subscribe('private-chat.{{ auth()->id() }}');
    channel.bind('MessageSent', function(data) {
      alert(JSON.stringify(data));
    });
  })
  .catch((error) => {
    // Handle authentication error
    console.error('Authentication failed:', error);
  });




const channel = pusher.subscribe(channelName);

channel.bind_global(function (eventName, data) {
    // console.log(data);
    setTimeout(()=>{
         return window.livewire.emit('broadcastedMessageReceived',data)
    }, 200)
 
});

channel.bind('pusher:subscription_error', function (status) {
  console.log('Subscription error:', status);
})
</script>
<link rel="stylesheet" type="text/css" href="/lib/jquery-modal-master/jquery.modal.min.css"> 
	
<script src="/lib/jquery-3.6.3.min.js"></script>
<script src="/lib/jquery-modal-master/jquery.modal.min.js"></script>
<script defer src="/js/main.js?v=0.0.1"></script>
</div>




