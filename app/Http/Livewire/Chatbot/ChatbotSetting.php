<?php

namespace App\Http\Livewire\Chatbot;

use App\Models\ChatbotSetting as ModelsChatbotSetting;
use Livewire\Component;

class ChatbotSetting extends Component
{
    public $content, $contextPrompt;

    public function mount()
    {
        $contextPrompt = ModelsChatbotSetting::where('id', 1)->first();
        $this->fill(['content' => $contextPrompt->context ?? null]);
    }

    public function updateContext() {
        // $context = ModelsChatbotSetting::where('id', 1)->first();
        $context = ModelsChatbotSetting::find($this->contextPrompt);
        // $context->context = $this->content;
        // $context->save;

        dd($context);
        return redirect()->to('/chatbot-setting')->with([
            'toast_type' => 'success',
            'toast_message' => 'Berhasil Memperbaharui Context',
        ]);
        // dd($this->receivedContext);
    }

    public function render()
    {
        return view('livewire.chatbot.chatbot-setting');
    }
}
