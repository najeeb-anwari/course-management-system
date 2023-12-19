<?php

namespace App\Livewire\Instructors;

use App\Models\Instructor;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class InstructorList extends Component
{
    use WithPagination;
    public $totalInstructors;
    public $search = "";

    #[Title('Instructors')]
    public function render()
    {
        return view('livewire.instructors.instructor-list')
            ->with(['instructors' => Instructor::where('name', 'like', '%'. $this->search . '%')
            ->latest()
            ->paginate(6)]);
    }

    function mount() {
        $this->totalInstructors = Instructor::count();
    }

    public function updatingSearch() {
        $this->gotoPage(1);
    }

    function destroy(Instructor $instructor) {
        $instructor->delete();

        return redirect()->route('instructors.index')
                        ->with('success','Instructor deleted successfully');
    }

}
