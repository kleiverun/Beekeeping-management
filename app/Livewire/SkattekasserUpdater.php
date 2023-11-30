<?php

namespace App\Livewire;

use Livewire\Component;

class SkattekasserUpdater extends Component
{
    public $bikubeid; // Rename bikubeid for consistency
    public $skattekasser;
    public $hive; // Declare the hive property

    public function render()
    {
        return view('livewire.skattekasser-updater');
    }

    public function mount($hive)
    {
        $this->bikubeid = $hive->id;
        $this->skattekasser = $hive->super;
    }

    public function increaseSkattekasser()
    {
        $hive = \App\Models\Hive::find($this->bikubeid);
        ++$hive->super;
        $hive->save();

        // Refresh the data in the component
        $this->skattekasser = $hive->super;
    }

    public function decreaseSkattekasser()
    {
        $hive = \App\Models\Hive::find($this->bikubeid);
        --$hive->super;
        $hive->save();

        // Refresh the data in the component
        $this->skattekasser = $hive->super;
    }
}
