<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class bigardSelect extends Component
{
    public $bigard;

    /**
     * Create a new component instance.
     */
    public function __construct($bigard)
    {
        $this->bigard = $bigard;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|\Closure|string
    {
        return view('components.bigard-select');
    }
}
