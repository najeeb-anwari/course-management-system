<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Str;

class StudentForm extends Component
{
    use WithFileUploads;

    public $student;
    public $name;
    public $father_name;
    public $phone_number;
    public $email;
    public $photo;

    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'father_name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|unique:students,email,' . $this->student->id,
            'photo' => 'nullable|image|max:2048',
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



        if ($this->photo) {
            // check if we already have a record
            if (
                $this->student->photo_path != null &&
                $this->student->photo_name != null
            ) {
                $imagePath = "/public" . $this->student->photo_path .
                    $this->student->photo_name;
                if (Storage::exists($imagePath)) {
                    Storage::delete($imagePath);
                }
                $this->photo->storeAs("/public" . $this->student->photo_path, $this->student->photo_name);
            } else {
                // we don't have a photo so set the photo path and name
                // and store it
                $path = "/files/photos/students/" . Str::uuid()->toString() . "/";
                $imgName = $this->photo->getClientOriginalName();
                $this->photo->storeAs("/public" . $path, $imgName);
                $this->student->photo_path = $path;
                $this->student->photo_name = $imgName;
            }
        }
        $this->student->save();
        session()->flash(
            'success',
            $this->student->wasRecentlyCreated ?
                'Student created successfully.' :
                'Student updated successfully.'
        );
        return $this->redirectRoute('students.index', navigate: true);
    }

    function removePic()
    {
        $this->reset('photo');
        if (
            $this->student->photo_path != null
        ) {
            $imagePath = "/public" . $this->student->photo_path;

            if (Storage::exists($imagePath)) {
                Storage::deleteDirectory($imagePath);
            } else {
                dd('File does not exists.');
            }
            $this->student->photo_path = null;
            $this->student->photo_name = null;
            $this->student->save();
        }
    }
}
