<?php

namespace App\Livewire;

use Livewire\Component;

class SkattekasserUpdater extends Component
{
    public $hiveid;
    public $super; // Use the correct property name
    public $hive; // Declare the hive property

    public function render()
    {
        return view('livewire.skattekasser-updater');
    }

    public function mount($hive)
    {

        $this->hiveid = $hive->id;
        $this->super = $hive->super; // Use the correct property name
    }

    public function increaseSkattekasser()
    {
        $hive = \App\Models\Hive::find($this->hiveid);
        ++$hive->super;
        $hive->save();

        // Refresh the data in the component
        $this->super = $hive->super; // Use the correct property name
    }

    public function decreaseSkattekasser()
    {
        $hive = \App\Models\Hive::find($this->hiveid);
        --$hive->super;
        $hive->save();

        // Refresh the data in the component
        $this->super = $hive->super; // Use the correct property name
    }
}
