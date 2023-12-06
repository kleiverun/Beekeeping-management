<?php

namespace App\Livewire;

use Livewire\Component;

class RegisterHarvest extends Component
{
    public $hives;
    public $selectedHiveId;

    public function render()
    {
        return view('livewire.register-harvest')->with('hives', $this->hives);
    }

    public function selectHive($hiveId)
    {
        $this->selectedHiveId = $hiveId;
    }
}
