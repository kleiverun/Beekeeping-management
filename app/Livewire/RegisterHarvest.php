<?php

// Livewire component class

namespace App\Livewire;

use App\Models\Harvest;
use App\Models\Hive;
use Livewire\Component;

class RegisterHarvest extends Component
{
    public $hives;
    public $selectedHiveId;
    public $harvestWeight;
    public $maxSupers;
    public $supersHarvested;
    public $harvestDate;
    public $description;
    public $maxSkattekasser;

    public function mount($hives)
    {
        $this->hives = $hives;
    }

    public function render()
    {
        // Load hive data when a hive is selected
        if ($this->selectedHiveId) {
            $this->maxSkattekasser = Hive::findOrFail($this->selectedHiveId)->super;
        }

        return view('livewire.register-harvest')->with('hives', $this->hives);
    }

    // Create a new harvest instance and populate its fields
    public function newHarvest()
    {
        $this->validate([
            'harvestWeight' => 'required',
            'supersHarvested' => 'required|numeric|min:0|max:'.$this->maxSkattekasser,   // Adjusted validation
            'harvestDate' => 'required|date',
            'description' => 'required',
        ]);

        // Use create method on Harvest model to store a new record
        Harvest::create([
            'hiveID' => $this->selectedHiveId,
            'harvestWeight' => $this->harvestWeight,
            'supersHarvested' => $this->supersHarvested,
            'dateHarvested' => $this->harvestDate,
            'description' => $this->description,
        ]);
        // Then update the hive super count
        $hive = Hive::find($this->selectedHiveId);
        $hive->super -= $this->supersHarvested;
        $hive->save();

        // Reset the form
        $this->selectedHiveId = null;
        $this->harvestWeight = null;
        $this->supersHarvested = null;
        $this->harvestDate = null;
        $this->description = null;

        // Emit an event if needed
    }

    public function selectAllSupers()
    {
        // Your implementation for selectAllSupers method
    }

    // ... Other methods as needed
}
