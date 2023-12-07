<div class="send_message">
@if ($this->selectedConversation)
<div class="chat_down">
        <form wire:submit.prevent='sendMessageFile' enctype="multipart/form-data" class="chat_send-file">
            <input  onchange="readSendFile(this)" type="file" name="" id="">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.44 11.0499L12.25 20.2399C11.1242 21.3658 9.59723 21.9983 8.00505 21.9983C6.41286 21.9983 4.88589 21.3658 3.76005 20.2399C2.6342 19.1141 2.00171 17.5871 2.00171 15.9949C2.00171 14.4027 2.6342 12.8758 3.76005 11.7499L12.95 2.55992C13.7006 1.80936 14.7186 1.3877 15.78 1.3877C16.8415 1.3877 17.8595 1.80936 18.61 2.55992C19.3606 3.31048 19.7823 4.32846 19.7823 5.38992C19.7823 6.45138 19.3606 7.46936 18.61 8.21992L9.41005 17.4099C9.03476 17.7852 8.52577 17.996 7.99505 17.996C7.46432 17.996 6.95533 17.7852 6.58005 17.4099C6.20476 17.0346 5.99393 16.5256 5.99393 15.9949C5.99393 15.4642 6.20476 14.9552 6.58005 14.5799L15.07 6.09992" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                
                
        </form>
        <div class="chat_input">
            <input wire:model='body' type="text" placeholder="Написать сообщение" name="" id="">
        </div>
        <form wire:submit.prevent='sendMessage' class="chat_send_button">
            <button >
                <img src="{{ asset("public/images/arrow-right.png") }}" alt="">
            </button>
        </form>
    
</div>
@endif
<script>
                function readSendFile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        console.log(input.value);
                        window.livewire.emit("sendMessageFile",e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
</script>
</div>
