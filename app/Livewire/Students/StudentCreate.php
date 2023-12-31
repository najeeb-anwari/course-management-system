<?php

namespace App\Livewire\Students;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create Student')]
class StudentCreate extends Component
{

    public $breadcrumbItems;

    public function render()
    {
        return view('livewire.students.student-create');
    }

    function mount() {
        $this->breadcrumbItems = [
            ['label' => 'Dashboard', 'link' => route('dashboard')],
            ['label' => 'User', 'link' => '#'],
            ['label' => 'Students', 'link' => route('students.index')],
            ['label' => 'View'],
        ];
    }
}
