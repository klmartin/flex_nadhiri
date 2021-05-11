<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profile extends Component
{
	public $first_name;
	public $last_name;
	public $address;
	public $phone_number;
	public $email;
	public $sex;
	public $dob;
	public $image;
	

    public function addProfile(){

    	  $profile = new Profile();
    	  $profile->first_name = $this->firstname;
    	  $profile->last_name = $this->last_name;
    	  $profile->address = $this->address;
    	  $profile->phone_number = $this->phone_number;
    	  $profile->email = $this->email;
    	  $profile->sex = $this->sex;
    	  $profile->dob = $this->dob;
    	  $imageName=Carbon::now()->timestamp. '.' . $this->image->extension();
    	  $this->image->storeAs('profiles', $imageName);
    	  $profile->image = $imageName;
    	  $profile->save();
    	  session()->Flash('message', 'Your Profile Is Succesfully Created!'); 
    }

      public function render()
    {
        return view('livewire.profile')->layout('layouts.base');
    }
  
    	
}
