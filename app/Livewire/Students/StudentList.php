<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class StudentList extends Component
{
    use WithPagination;

    public $breadcrumbItems;

    public $totalStudents;
    public $search = "";

    #[Title('Students')]
    public function render()
    {
        return view('livewire.students.student-list')
            ->with(['students' => Student::where('name', 'like', '%'. $this->search . '%')
            ->latest()
            ->paginate(6)]);
    }

    function mount() {
        $this->totalStudents = Student::count();

        $this->breadcrumbItems = [
            ['label' => 'Dashboard', 'link' => route('dashboard')],
            ['label' => 'User', 'link' => '#'],
            ['label' => 'Students'],
        ];
    }

    public function updatingSearch() {
        $this->gotoPage(1);
    }

    function destroy(Student $student) {
        $student->delete();

        session()->flash('success','Student deleted successfully');
        return $this->redirectRoute('students.index', navigate: true);
    }
}
