<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;
    public $settings;
    public $title_web, $header_web, $slogan_web, $logo_web, $favicon_web;

    public function mount() {
        $this->settings = Setting::find(1);
        $this->title_web = $this->settings->title_web;
        $this->header_web = $this->settings->header_web;
        $this->slogan_web = $this->settings->slogan_web;
        $this->logo_web = $this->settings->logo_web;
        $this->favicon_web = $this->settings->favicon_web;
    }

    public function updateGeneralSetting() {
        $this->validate([
            'title_web' => ['required'],
            'header_web' => ['required'],
            'slogan_web' => ['required'],
        ]);

        // $pathLogo = null;
        // if ($this->logo_web !== null) {
        //     $newName  = 'logo' . now()->timestamp . '_' . $this->logo_web->getClientOriginalName();
        //     $pathLogo = $this->logo_web->storeAs('foto-website', $newName);
        // }

        // $pathfavicon = null;
        // if ($this->favicon_web !== null) {
        //     $newName  = 'favicon' . now()->timestamp . '_' . $this->favicon_web->getClientOriginalName();
        //     $pathfavicon = $this->favicon_web->storeAs('foto-website', $newName);
        // }

        // Setting::create([
        //     'tittle_web' => $this->nama,
        //     'header_web' => $this->email,
        //     'slogan_web' => $this->no_hp,
        //     'logo_web' => $pathLogo,
        //     'favicon_web' => $pathfavicon,
        // ]);

        $this->settings->update ([
            'title_web' => $this->title_web,
            'header_web' => $this->header_web,
            'slogan_web' => $this->slogan_web,
        ]);

        return redirect('/settings')->with([
            'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
            'toast_message' => 'Berhasil Memperbaharui Website', // Isi pesan
        ]);
    }

    public function render()
    {
        return view('livewire.settings');
    }
}
