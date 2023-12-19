<?php

namespace App\Livewire\Instructors;

use App\Models\Instructor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class InstructorForm extends Component
{
    use WithFileUploads;

    public $instructor;
    public $name;
    public $father_name;
    public $position;
    public $phone_number;
    public $email;
    public $photo_url;

    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'father_name' => 'required|string',
            'position' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|unique:instructors,email,' . $this->instructor->id,
            'photo_url' => 'nullable|image|max:2048',
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



        if ($this->photo_url) {
            $imagePath = "/public" . $this->instructor->photo_url;
            if(Storage::exists($imagePath)){
                Storage::delete($imagePath);
            }
            $path ="/files/instructors/photos/";
            $imgName = $this->photo_url->getClientOriginalName();
            $fullPath = $path . $imgName;
            $this->photo_url->storeAs("/public". $path, $imgName);
            $this->instructor->photo_url = $fullPath;
        }
        $this->instructor->save();
        session()->flash('success',
            $this->instructor->wasRecentlyCreated ?
                'Instructor created successfully.' :
                'Instructor updated successfully.');

        return redirect()->route('instructors.index');
    }

    function removePic() {
        $this->reset('photo_url');
        if($this->instructor->photo_url){
            if(File::exists(public_path($this->instructor->photo_url))){
                File::delete(public_path($this->instructor->photo_url));
            }else{
                dd('File does not exists.');
            }
            $this->instructor->photo_url = null;
            $this->instructor->save();
        }
    }
}
