<?php

namespace App\Http\Livewire\Chatbot;

use OpenAI;
use Livewire\Component;

class ChatAi extends Component
{
    public function newQuestion () {
        $yourApiKey = env('OPENAI_API_KEY=');
        $client = OpenAI::client($yourApiKey);

        $result = $client->chat()->create([
            'model' => 'gpt-4',
            'messages' => [
                ['role' => 'user', 'content' => 'Hello!'],
            ],
        ]);

        echo $result->choices[0]->message->content; // Hello! How can I assist you today?
    }

    public function render()
    {
        return view('livewire.chatbot.chat-ai');
    }
}
