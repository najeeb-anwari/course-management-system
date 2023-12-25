<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('View Student')]
class StudentView extends Component
{
    public $student;

    public $breadcrumbItems;

    public function render()
    {
        return view('livewire.students.student-view');
    }

    public function mount(Student $student)
    {
        $this->student = $student;

        $this->breadcrumbItems = [
            ['label' => 'Dashboard', 'link' => route('dashboard')],
            ['label' => 'User', 'link' => '#'],
            ['label' => 'Student', 'link' => route('students.index')],
            ['label' => 'View'],
        ];
    }
}
