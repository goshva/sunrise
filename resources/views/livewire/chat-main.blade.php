<div class="chat">
    <div class="chat_container">

        <div class="chat_list_container">

            @livewire('chat-list')

        </div>

        <div class="chat_box_container">

            @livewire('chat-box')
            @livewire('send-message')
        </div>
    </div>
    <x-footer></x-footer>
<script>
    window.addEventListener('chatSelected', event => {

        if (window.innerWidth < 768) {

            $('.chat_list_container').hide();
            $('.chat_box_container').show();

        }

        $('.chatbox_body').scrollTop($('.chatbox_body')[0].scrollHeight);
    let height= $('.chatbox_body')[0].scrollHeight; 
//alert(height);
window.livewire.emit('updateHeight',{
   
height:height,


});
    });


    $(window).resize(function() {

        if (window.innerWidth > 768) {
            $('.chat_list_container').show();
            $('.chat_box_container').show();

        }

    });


    $(document).on('click', '.return', function() {

        $('.chat_list_container').show();
        $('.chat_box_container').hide();


    });
</script>
</div>

