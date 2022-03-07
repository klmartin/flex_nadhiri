<?php


namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AddMemberComponent extends Component
{
	public $name, $phone_no, $lastname, $role, $email,  $password;

	public function addMember()
	{
		$mbr = new User();
		$mbr->name = $this->name;
		$mbr->lastname = $this->lastname;
		$mbr->role = 'member';
		$mbr->email = $this->email;
		$mbr->phone_no = $this->phone_no;
		$mbr->password = Hash::make($this->password);
		$mbr->save();
		session()->flash('message', 'Member Has Been Added Succesfully');

	}
 
    public function render()
    {
        return view('livewire.admin.add-member-component');
    }
}
