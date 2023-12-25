<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class StudentForm extends Component
{
    use WithFileUploads;

    public $student;
    public $name;
    public $father_name;
    public $phone_number;
    public $email;
    public $photo_url;

    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'father_name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|unique:students,email,' . $this->student->id,
            'photo_url' => 'nullable|image|max:2048',
        ];
    }

    public function render()
    {
        return view('livewire.students.student-form');
    }

    public function mount(Student $student = null)
    {
        $this->student = $student ?: new Student;
        $this->name = $this->student->name;
        $this->father_name = $this->student->father_name;
        $this->phone_number = $this->student->phone_number;
        $this->email = $this->student->email;
    }

    public function save()
    {
        $this->validate();
        $this->student->name = $this->name;
        $this->student->father_name = $this->father_name;
        $this->student->email = $this->email;
        $this->student->phone_number = $this->phone_number;



        if ($this->photo_url) {
            $imagePath = "/public" . $this->student->photo_url;
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
            $path = "/files/students/photos/";
            $imgName = $this->photo_url->getClientOriginalName();
            $fullPath = $path . $imgName;
            $this->photo_url->storeAs("/public" . $path, $imgName);
            $this->student->photo_url = $fullPath;
        }
        $this->student->save();
        session()->flash(
            'success',
            $this->student->wasRecentlyCreated ?
                'student created successfully.' :
                'student updated successfully.'
        );

        return $this->redirectRoute('students.index', navigate: true);
    }

    function removePic()
    {
        $this->reset('photo_url');
        if ($this->student->photo_url) {
            if (File::exists(public_path($this->student->photo_url))) {
                File::delete(public_path($this->student->photo_url));
            } else {
                dd('File does not exists.');
            }
            $this->student->photo_url = null;
            $this->student->save();
        }
    }
}
