<?php

namespace App\Http\Livewire\Conversations;

use App\Models\Message;
use Livewire\Component;

class ConversationMessageOwn extends Component
{

    public $message;

    public function mount(Message $message)
    {
        $this->message = $message;
    }

    public function render()
    {
        return view('livewire.conversations.conversation-message-own');
    }
}
