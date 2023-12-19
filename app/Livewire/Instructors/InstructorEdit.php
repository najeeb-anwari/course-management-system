<?php

namespace App\Livewire\Instructors;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Instructor')]
class InstructorEdit extends Component
{
    public $instructor;
    public function render()
    {
        return view('livewire.instructors.instructor-edit');
    }

    function mount($instructor) {
        $this->instructor = $instructor;
    }
}
