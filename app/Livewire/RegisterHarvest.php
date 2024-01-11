<?php

// Livewire component class

namespace App\Livewire;

use App\Http\Requests\V1\StoreHarvestRequest;
use App\Models\Harvest;
use App\Models\Hive;
use http\Env\Request;
use Livewire\Component;

class RegisterHarvest extends Component
{
    public $hives;
    public $selectedHiveId;
    public $harvestWeight;
    public $maxSupers;
    public $supersHarvested;
    public $dateHarvested;
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
        $this -> supersHarvested = 0;
    }

    // Validates a new harvest, creates a new harvest record and resets input fields
    public function newHarvest(\Illuminate\Http\Request $request): void
    {
        $this->validate([
            'supersHarvested' => 'required|numeric|min:0|max:'.$this->maxSkattekasser,
        ]);
        Harvest::create([
            'hive_id' => $this->selectedHiveId,
            'harvestWeight' => $this->harvestWeight,
            'supersHarvested' => $this->supersHarvested,
            'dateHarvested' => $this->dateHarvested,
            'description' => $this->description
        ]);

        // Subtract the number of supers harvested from the hive
        $hive = Hive::find($this->selectedHiveId);
        $hive->super -= $this->supersHarvested;
        $hive->save();

        $this->reset( 'harvestWeight', 'supersHarvested', 'dateHarvested', 'description', 'maxSkattekasser');
        $this->selectedHiveId = $this->hives->first()->id;
    }
    /*
     * If the user selects the allSupers button.
     */
    public function selectAllSupers() : void
    {
        $this->supersHarvested = $this->maxSkattekasser;
    }
}
