<?php

namespace App\Http\Livewire;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class SendMessage extends Component
{
    use WithFileUploads;
    public $selectedConversation;
    public $receiverInstance;
    public $body;
    public $file;
    public $createdMessage;
    protected $listeners = ['updateSendMessage', 'sendMessageFile', 'dispatchMessageSent','resetComponent'];

    public function sendMessageFile($file){
        $questionFileParts = explode(";base64,",$file);
        if($questionFileParts[0] == 'data:image/jpeg' || $questionFileParts[0] == "data:image/png" || $questionFileParts[0] == "data:image/webp"){
            $file = base64_decode($questionFileParts[1]);
            $newName = time() . "-" . strpos($file,0,20) . ".jpg";
            Storage::disk('public')->put('images'.  '/' . $newName , $file);
            $this->file =url("/storage/app/public/images/".$newName);
            $this->createdMessage = Message::create([
                'conversation_id' => $this->selectedConversation->id,
                'sender_id' => auth()->id(),
                'receiver_id' => $this->receiverInstance->id,
                'body' => $this->file,
                'type' => "image"
            ]);

        
       }elseif($questionFileParts[0] == 'data:video/quicktime' || $questionFileParts[0] == "data:video/mp4" || $questionFileParts[0] == "data:image/webp"){
        $file = base64_decode($questionFileParts[1]);
        $newName = time() . "-" . strpos($file,0,20) . ".mp4";
        Storage::disk('public')->put('videos'.  '/' . $newName , $file);
        $this->file =url("/storage/app/public/videos/".$newName);
            $this->createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiverInstance->id,
            'body' => $this->file,
            'type' => "video"
        ]);
       }else{
        $file = base64_decode($questionFileParts[1]);
        $newName = time() . "-" . strpos($file,0,20) . ".xlsx";
        Storage::disk('public')->put('files'.  '/' . $newName , $file);
        $this->file =url("/storage/app/public/files/".$newName);
        $this->createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiverInstance->id,
            'body' => $this->file,
            'type' => "file"
        ]);
       }
        $this->selectedConversation->last_time_message = $this->createdMessage->created_at;
        $this->selectedConversation->save();
        $this->emitTo('chat-box', 'pushMessage', $this->createdMessage->id);


        //reshresh coversation list 
        $this->emitTo('chat-list', 'refresh');
        $this->reset('file');

        $this->emitSelf('dispatchMessageSent');
        
    }
    public function resetComponent()
    {
   
  $this->selectedConversation= null;
  $this->receiverInstance= null;
 
        # code...
    }
  

    
    function updateSendMessage(Conversation $conversation, User $receiver)
    {

        //  dd($conversation,$receiver);
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;
        # code...
    }




    public function sendMessage()
    {
        if ($this->body == null) {
            return null;
        }
      
        $this->createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiverInstance->id,
            'body' => $this->body,
        ]);
    

        $this->selectedConversation->last_time_message = $this->createdMessage->created_at;
        $this->selectedConversation->save();
        $this->emitTo('chat-box', 'pushMessage', $this->createdMessage->id);


        //reshresh coversation list 
        $this->emitTo('chat-list', 'refresh');
        $this->reset('body');

        $this->emitSelf('dispatchMessageSent');
        
        // dd($this->body);
        # code..
    }



    public function dispatchMessageSent()
    {

        broadcast(new MessageSent(Auth()->user(), $this->createdMessage, $this->selectedConversation, $this->receiverInstance));
        # code...
    }
    public function render()
    {
        return view('livewire.send-message');
    }
}
