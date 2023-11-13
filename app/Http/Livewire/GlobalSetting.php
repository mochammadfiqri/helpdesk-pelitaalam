<?php

namespace App\Http\Livewire;

use App\Models\GlobalSettingModel;
use App\Models\WebsiteSetting;
use Livewire\Component;
use Livewire\WithFileUploads;

class GlobalSetting extends Component
{
    use WithFileUploads;
    public $settings;
    public $app_name, $logo_web, $favicon_web;

    public function mount() {
        $this->settings = WebsiteSetting::find(1);
        $this->app_name = $this->settings->app_name;
        $this->logo_web = $this->settings->logo_web;
        $this->favicon_web = $this->settings->favicon_web;
    }

    public function updateGeneralSetting() {
        $this->validate([
            'app_name' => ['required'],
            'logo_web' => ['required'],
            'favicon_web' => ['required'],
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
            'app_name' => $this->title_web,
            'logo_web' => $this->header_web,
            'favicon_web' => $this->slogan_web,
        ]);

        return redirect('/settings')->with([
            'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
            'toast_message' => 'Berhasil Memperbaharui Website', // Isi pesan
        ]);
    }
    
    public function render()
    {
        return view('livewire.global-setting');
    }
}
