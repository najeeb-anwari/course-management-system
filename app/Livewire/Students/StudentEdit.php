<?php

namespace App\Livewire\Students;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Student')]
class StudentEdit extends Component
{
    public $breadcrumbItems;

    public $student;

    public function render()
    {
        return view('livewire.students.student-edit');
    }

    function mount($student) {
        $this->student = $student;

        $this->breadcrumbItems = [
            ['label' => 'Dashboard', 'link' => route('dashboard')],
            ['label' => 'User', 'link' => '#'],
            ['label' => 'Students', 'link' => route('students.index')],
            ['label' => 'Edit'],
        ];

    }
}
