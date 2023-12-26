<?php

namespace App\Livewire\Instructors;

use App\Models\Instructor;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Str;

class InstructorForm extends Component
{
    use WithFileUploads;

    public $instructor;
    public $name;
    public $father_name;
    public $position;
    public $phone_number;
    public $email;
    public $photo;

    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'father_name' => 'required|string',
            'position' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|unique:instructors,email,' .
                $this->instructor->id,
            'photo' => 'nullable|image|max:2048',
        ];
    }


    public function render()
    {
        return view('livewire.instructors.instructor-form');
    }

    public function mount(Instructor $instructor = null)
    {
        $this->instructor = $instructor ?: new Instructor;
        $this->name = $this->instructor->name;
        $this->father_name = $this->instructor->father_name;
        $this->position = $this->instructor->position;
        $this->phone_number = $this->instructor->phone_number;
        $this->email = $this->instructor->email;
    }

    public function save()
    {
        $this->validate();
        $this->instructor->name = $this->name;
        $this->instructor->father_name = $this->father_name;
        $this->instructor->position = $this->position;
        $this->instructor->email = $this->email;
        $this->instructor->phone_number = $this->phone_number;


        // if photo is chosen
        if ($this->photo) {
            // check if we already have a record
            if (
                $this->instructor->photo_path != null &&
                $this->instructor->photo_name != null
            ) {
                $imagePath = "/public" . $this->instructor->photo_path .
                    $this->instructor->photo_name;
                if (Storage::exists($imagePath)) {
                    Storage::delete($imagePath);
                }
                $this->photo->storeAs("/public" . $this->instructor->photo_path, $this->instructor->photo_name);
            } else {
                // we don't have a photo so set the photo path and name
                // and store it
                $path = "/files/photos/instructors/" . Str::uuid()->toString() . "/";
                $imgName = $this->photo->getClientOriginalName();
                $this->photo->storeAs("/public" . $path, $imgName);
                $this->instructor->photo_path = $path;
                $this->instructor->photo_name = $imgName;
            }
        }
        $this->instructor->save();
        session()->flash(
            'success',
            $this->instructor->wasRecentlyCreated ?
                'Instructor created successfully.' :
                'Instructor updated successfully.'
        );
        return $this->redirectRoute('instructors.index', navigate: true);
    }

    function removePic()
    {
        $this->reset('photo');
        if (
            $this->instructor->photo_path != null
        ) {
            $imagePath = "/public" . $this->instructor->photo_path;

            if (Storage::exists($imagePath)) {
                Storage::deleteDirectory($imagePath);
            } else {
                dd('File does not exists.');
            }
            $this->instructor->photo_path = null;
            $this->instructor->photo_name = null;
            $this->instructor->save();
        }
    }
}
