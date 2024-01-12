<?php

namespace App\Http\Livewire\Pages;

use OpenAI;
use Livewire\Component;
use App\Models\ChatbotSetting;
use Illuminate\Support\Facades\Auth;

class ChatbotPages extends Component
{
    public $sendPrompt;
    
    public function newPrompt() {
        $contextPrompt = ChatbotSetting::where('id', 1)->first();

        $content = $this->sendPrompt;
        $context = session()->get('chat.' . Auth::user()->id, [['role' => 'user', 'content' => $contextPrompt->context]]);
        $context[] = ['role' => 'user', 'content' => $content];

        $yourApiKey = env('OPENAI_API_KEY');
        $client = OpenAI::client($yourApiKey); 

        $response = $client->chat()->create([
            'model'    => 'gpt-3.5-turbo-1106',
            'messages' => $context,
        ]);

        foreach ($response->choices as $result) { 
            $context[] = ['role' => 'assistant', 'content' => $result->message->content];
        }

        session(['chat.' . Auth::user()->id => $context]);

        return redirect('/chat-ai');
    }

    public function resetSession()
    {
        // Lakukan sesuatu untuk mereset sesi
        session(['chat' => []]);

        // Debugging
        // dd(session('chat'));
    }

    public function render()
    {
        $contextPrompt = ChatbotSetting::where('id', 1)->first();
        $context = session()->get('chat.' . Auth::user()->id, [['role' => 'user', 'content' => $contextPrompt->context]]);

        return view('livewire.pages.chatbot-pages', [
            'context' => $context,
        ]);
    }
}
