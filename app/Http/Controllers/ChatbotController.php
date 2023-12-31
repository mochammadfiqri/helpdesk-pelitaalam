<?php

namespace App\Http\Controllers;

use OpenAI;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function index () {
        $yourApiKey = env('OPENAI_API_KEY');
        $client = OpenAI::client($yourApiKey);

        $response = $client->chat()->create([
            'model'    => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => 'Hello!'],
            ],
        ]);

        $response->id; // 'chatcmpl-6pMyfj1HF4QXnfvjtfzvufZSQq6Eq'
        $response->object; // 'chat.completion'
        $response->created; // 1677701073
        $response->model; // 'gpt-3.5-turbo-0301'

        foreach ($response->choices as $result) {
        $result->index; // 0
        $result->message->role; // 'assistant'
        $result->message->content; // '\n\nHello there! How can I assist you today?'
        $result->finishReason; // 'stop'
        }

        $response->usage->promptTokens; // 9,
        $response->usage->completionTokens; // 12,
        $response->usage->totalTokens; // 21

        $response->toArray(); // ['id' => 'chatcmpl-6pMyfj1HF4QXnfvjtfzvufZSQq6Eq', ...]

        return view('livewire.pages.chatbot-pages', compact('response'));
    }
}
