<?php

namespace App\Livewire\Instructors;

use App\Models\Instructor;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create Instructor')]
class InstructorView extends Component
{
    public $instructor;

    public function render()
    {
        return view('livewire.instructors.instructor-view');
    }

    public function mount(Instructor $instructor)
    {
        $this->instructor = $instructor;
    }
}
