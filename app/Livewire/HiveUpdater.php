<?php

namespace App\Livewire;

use Livewire\Component;

class HiveUpdater extends Component
{
    public $hiveid;
    public $super; // Use the correct property name
    public $hive; // Declare the hive property

    public function render()
    {
        return view('livewire.hive-updater');
    }

    public function mount($hive)
    {
        $this->hiveid = $hive->id;
        $this->super = $hive->super; // Use the correct property name
    }

    public function increaseSuper()
    {



        $hive = \App\Models\Hive::find($this->hiveid);
        ++$hive->super;
        $hive->save();

        // Refresh the data in the component
        $this->super = $hive->super; // Use the correct property name
    }

    public function decreaseSuper()
    {
        $hive = \App\Models\Hive::find($this->hiveid);
        --$hive->super;
        $hive->save();

        // Refresh the data in the component
        $this->super = $hive->super; // Use the correct property name
    }
}
