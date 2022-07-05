<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class Conversation extends Component
{

    public $conversation;
    public string $message = '';

    protected $listeners = [
        'sent' => '$refresh'
    ];

    public function mount($conversation)
    {
        $this->conversation = $conversation;
    }

    public function sendMessage()
    {
        Message::create([
            'user_id' => auth()->user()->id,
            'conversation_id' => $this->conversation->id,
            'body' => $this->message
        ]);

        $this->message = '';
        $this->emit('sent');
    }

    public function render()
    {
        return view('livewire.conversation');
    }
}
