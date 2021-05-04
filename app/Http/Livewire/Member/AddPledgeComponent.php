<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use App\Models\Purpose;
use App\Models\Pledge;
use App\Models\User;
use Auth;

class AddPledgeComponent extends Component
{
	public $amount;
	public $purpose_id;
	public $user_id;


	public function savePledge()
	{
		$user = Auth::user()->id;
		$pymt = new Pledge();
		$pymt->amount = $this->amount;
		$pymt->user_id = $user;
		$pymt->purpose_id = $this->purpose_id;
		$pymt->save();
		session()->Flash('message', 'Pledge Has Been Successfully Added!');
	}
    public function render()
    {
    	$purp = Purpose::all();

        return view('livewire.member.add-pledge-component', ['purp'=>$purp]);
    }
}
