<?php

namespace App\Livewire;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $items;
    public $lastItem;
    public function render()
    {
        return view('livewire.breadcrumb');
    }

    function mount() {
        $this->lastItem = array_pop($this->items);
    }
}
