<?php

namespace App\Livewire\Instructors;

use App\Models\Instructor;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('View Instructor')]
class InstructorView extends Component
{
    public $instructor;

    public $breadcrumbItems;

    public function render()
    {
        return view('livewire.instructors.instructor-view');
    }

    public function mount(Instructor $instructor)
    {
        $this->instructor = $instructor;

        $this->breadcrumbItems = [
            ['label' => 'Dashboard', 'link' => route('dashboard')],
            ['label' => 'User', 'link' => '#'],
            ['label' => 'Instructor', 'link' => route('instructors.index')],
            ['label' => 'View'],
        ];
    }
}
