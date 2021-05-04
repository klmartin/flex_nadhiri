<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Purpose;
use App\Models\User;
use App\Models\Pledge;


class AddPledgeComponent extends Component
{
	public $user, $amount, $purpose_id, $user_id, $purp;
	public $selectedUser = NULL;

	public function mount()
	{
		$this->user = User::all();
		$this->purp = Purpose::all();

	}

	public function savePledge()
	{
		$pymt = new Pledge();
		$pymt->amount = $this->amount;
		$pymt->user_id = $this->selectedUser;
		$pymt->purpose_id = $this->purpose_id;
		$pymt->save();
		session()->Flash('message', 'Pledge Has Been Successfully Added!');
	}


    public function render()
    {    	
        return view('livewire.admin.add-pledge-component');
    }
}
