<?php

namespace App\Livewire\Instructors;

use App\Models\Instructor;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class InstructorList extends Component
{
    use WithPagination;

    public $breadcrumbItems;

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

        $this->breadcrumbItems = [
            ['label' => 'Dashboard', 'link' => route('dashboard')],
            ['label' => 'User', 'link' => '#'],
            ['label' => 'Instructor'],
        ];
    }

    public function updatingSearch() {
        $this->gotoPage(1);
    }

    function destroy(Instructor $instructor) {
        $imagePath = "/public" . $instructor->photo_path;

        if (Storage::exists($imagePath)) {
            Storage::deleteDirectory($imagePath);
        }
        $instructor->delete();
        session()->flash('success','Instructor deleted successfully');
        return $this->redirectRoute('instructors.index', navigate: true);
    }

}
