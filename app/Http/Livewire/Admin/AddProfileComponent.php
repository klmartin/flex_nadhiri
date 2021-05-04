<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use App\Models\profile;

class AddProfileComponent extends Component
{ 
	use WithFileUploads;
    public $user_id, $status, $street, $city, $country, $zip_code, $image, $sex, $dob, $countrycode;
	public $user;
	public $selectedUser = NULL;


	 public function saveProfile()
	 {

	 	$uname = User::where('id', $this->selectedUser)->value('name');
        $countrycode = '+255';
        $profile = new profile();
        $profile->user_id = $this->selectedUser;
        $profile->status = $this->status;
        $profile->street = $this->street;
        $profile->city = $this->city;
        $profile->country = $this->country;
        $profile->zip_code = $this->zip_code;
        $profile->sex = $this->sex;
        $profile->dob = $this->dob;
        $imageName = $uname.'.'.$this->image->extension();
        $this->image->storeAs('profiles', $imageName);
        $profile->image = $imageName;
        $profile->save();
        session()->Flash('message', 'Profile Saved!');

    }

    public function render()
    {
    	$this->user =  DB::table('users')
    		->leftJoin('profiles', 'profiles.user_id', '=', 'users.id')
    		->whereNull('profiles.user_id')
    		->select('users.*')
    		->get();
        return view('livewire.admin.add-profile-component');
    }
}
