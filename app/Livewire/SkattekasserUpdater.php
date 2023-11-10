<?php

namespace App\Livewire;

use Livewire\Component;

class SkattekasserUpdater extends Component
{
    public $bikubeid; // Rename bikubeid for consistency
    public $skattekasser;
    public $bikube; // Declare the bikube property

    public function render()
    {
        return view('livewire.skattekasser-updater');
    }

    public function mount($bikube)
    {
        $this->bikubeid = $bikube->id;
        $this->skattekasser = $bikube->antallSkattekasser;
    }

    public function increaseSkattekasser()
    {
        $bikube = \App\Models\Bikube::find($this->bikubeid);
        ++$bikube->antallSkattekasser;
        $bikube->save();

        // Refresh the data in the component
        $this->skattekasser = $bikube->antallSkattekasser;
    }

    public function decreaseSkattekasser()
    {
        $bikube = \App\Models\Bikube::find($this->bikubeid);
        --$bikube->antallSkattekasser;
        $bikube->save();

        // Refresh the data in the component
        $this->skattekasser = $bikube->antallSkattekasser;
    }
}
