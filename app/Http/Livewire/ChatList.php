<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use App\Models\User;
use Livewire\Component;

class ChatList extends Component
{

   
    public $auth_id;
    public $conversations;
    public $receiverInstance;
    public $name;
    public $selectedConversation;
 
  protected $listeners= ['chatUserSelected','refresh'=>'$refresh','resetComponent','getUserPhoto'];



  public function resetComponent()
  {
 
$this->selectedConversation= null;
$this->receiverInstance= null;
 
      # code...
  }

 
     public function chatUserSelected(Conversation $conversation,$receiverId)
     {

    //    dd($receiverId);

    // $conversation->messages->where('read',0)->where('receiver_id',Auth()->user()->id);
      $this->selectedConversation= $conversation;
      foreach($conversation->messages->where('read',0)->where('receiver_id',Auth()->user()->id) as $message){
          $message->read = 1;
          $message->save();
          $this->emitSelf('refresh');
      }
      $receiverInstance= User::find($receiverId);
            $this->emitTo('chat-box','loadConversation', $this->selectedConversation,$receiverInstance);
            $this->emitTo('send-message','updateSendMessage',$this->selectedConversation,$receiverInstance);

         # code...
     }

     public function getUserPhoto(Conversation $conversation, $request){
                # code...
                $this->auth_id = auth()->id();
                //get selected conversation 
        
                if ($conversation->sender_id == $this->auth_id) {
                    $this->receiverInstance = User::firstWhere('id', $conversation->receiver_id);
                    # code...
                } else {
                    $this->receiverInstance = User::firstWhere('id', $conversation->sender_id);
                }
                if (isset($request)) {
                    // dd($this->receiverInstance->first_name);
        
                    return $this->receiverInstance->first_name. " " . $this->receiverInstance->last_name;
                    # code...
                }
     }
    public function getChatUserInstance(Conversation $conversation, $request)
    {
        # code...
        $this->auth_id = auth()->id();
        //get selected conversation 

        if ($conversation->sender_id == $this->auth_id) {
            $this->receiverInstance = User::firstWhere('id', $conversation->receiver_id);
            # code...
        } else {
            $this->receiverInstance = User::firstWhere('id', $conversation->sender_id);
        }
        if (isset($request)) {
            // dd($this->receiverInstance->first_name);

            return $this->receiverInstance->$request;
            # code...
        }
    }
    public function mount()
    {

        $this->auth_id = auth()->id();
        $this->conversations = Conversation::where('sender_id', $this->auth_id)
            ->orWhere('receiver_id', $this->auth_id)->orderBy('last_time_message', 'DESC')->get();

        # code...
    }

    public function render()
    {

        return view('livewire.chat-list');
    }
}
