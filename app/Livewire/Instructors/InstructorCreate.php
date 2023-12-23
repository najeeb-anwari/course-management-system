<?php

namespace App\Livewire\Instructors;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create Instructor')]
class InstructorCreate extends Component
{

    public $breadcrumbItems;

    public function render()
    {
        return view('livewire.instructors.instructor-create');
    }

    function mount() {
        $this->breadcrumbItems = [
            ['label' => 'Dashboard', 'link' => route('dashboard')],
            ['label' => 'User', 'link' => '#'],
            ['label' => 'Instructor', 'link' => route('instructors.index')],
            ['label' => 'View'],
        ];
    }
}
