<?php

namespace App\Http\Livewire\Conversations;

use App\Events\Conversations\ConversationUpdated;
use App\Events\Conversations\MessageAdded;
use App\Models\Conversation;
use Livewire\Component;
use Livewire\WithFileUploads;

class ConversationReply extends Component
{

    use WithFileUploads;

    public $body = '';
    public $attachment = '';
    public $attachment_name = '';
    public $conversation;


    public function mount(Conversation $conversation)
    {
        $this->conversation = $conversation;
    }


    protected $rules = [
        'body' => 'required',
        'attachment' => 'nullable|file|mimes:png,jpg,jpeg,gif,wav,mp3,mp4|max:102400',
    ];

    public function reply()
    {

        $this->validate();

        if ($this->attachment != '') {
            $this->attachment_name = md5($this->attachment . microtime()) . '.' . $this->attachment->extension();
            $this->attachment->storeAs('/', $this->attachment_name, 'media');
            $data['attachment'] = $this->attachment_name;
        }

        $data['body'] = $this->body;
        $data['user_id'] = auth()->id();

        $message = $this->conversation->messages()->create($data);
        $this->conversation->update([
            'last_message_at' => now(),
        ]);

        foreach ($this->conversation->others as $user) {
            $user->conversations()->updateExistingPivot($this->conversation, [
                'read_at' => null
            ]);
        }

        broadcast(new MessageAdded($message))->toOthers();
        broadcast(new ConversationUpdated($this->conversation));

        $this->emit('message.created', $message->id);

        $this->body = '';
        $this->attachment = '';
        $this->attachment_name = '';

    }

    public function removeAttachment()
    {
        $this->attachment = '';
        $this->attachment_name = '';
    }


    public function render()
    {
        return view('livewire.conversations.conversation-reply');
    }
}
