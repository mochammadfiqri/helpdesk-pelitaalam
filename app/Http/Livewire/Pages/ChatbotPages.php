<?php

namespace App\Http\Livewire\Pages;

use OpenAI;
use Livewire\Component;

class ChatbotPages extends Component
{
    public $sendPrompt;
    // protected $listeners = ['editContext'];
    
    // public function editContext($context) {
        
    // }

    public function newPrompt() {
        $content = $this->sendPrompt;
        $context = session()->get('chat', [['role' => 'user', 'content' => 'Sekarang kamu adalah seorang IT di SMK Pelita Alam. Tugas kamu adalah menjawab pertanyaan seputar Teknologi']]);
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

        session(['chat' => $context]);

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
        $context = session()->get('chat', [['role' => 'user', 'content' => 'Sekarang kamu adalah seorang IT di SMK Pelita Alam. Tugas kamu adalah menjawab pertanyaan seputar Teknologi']]);

        return view('livewire.pages.chatbot-pages', [
            'context' => $context,
        ]);
    }
}
