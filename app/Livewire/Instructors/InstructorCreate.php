<?php

namespace App\Livewire\Instructors;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create Instructor')]
class InstructorCreate extends Component
{
    public function render()
    {
        return view('livewire.instructors.instructor-create');
    }
}
