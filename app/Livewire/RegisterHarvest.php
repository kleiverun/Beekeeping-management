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
    protected $listeners = ['refreshHarvests'];

    public function mount($hives)
    {
        $this->hives = $hives;
    }

    /**
     * Render the component.
     */
    public function render()
    {
        // Load hive data when a hive is selected
        if ($this->selectedHiveId) {
            $this->maxSkattekasser = Hive::findOrFail($this->selectedHiveId)->super;
        }

        return view('livewire.register-harvest')->with('hives', $this->hives);
    }

    /**
     * If the hiveid in the form changes we will need to update the maxSkattekasser property,
     *  so that the user can't harvest more supers than the hive has.
     */
    public function handleHiveidChange()
    {
        $selectedHive = Hive::findOrFail($this->selectedHiveId);
        $this->maxSkattekasser = $selectedHive->super;
    }

    // Validates a new harvest, creates a new harvest record and resets input fields
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

        $this->reset('selectedHiveId', 'harvestWeight', 'supersHarvested', 'harvestDate', 'description', 'maxSkattekasser');
    }
    /*
     * If the user selects the allSupers button. 
     */
    public function selectAllSupers()
    {
        $this->supersHarvested = $this->maxSkattekasser;
    }
}
