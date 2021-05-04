<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Card;


class AssignCardComponent extends Component
{
	public $user_id, $card_no;
	
	public function addCard()
	{
		foreach ($this->user_id as $key=>$user_id)
		{
			$data = new Card();
			$data->user_id = $this->user_id[$key];
			$data->card_no = $this->card_no[$key];
			$data->save();
			session()->flash('message', 'Cards Have Been Assigned Successfully');
		}
	}

    public function render()
    {
    	$members = DB::table('users')
            ->leftJoin('cards', 'users.id', '=', 'cards.user_id')
            ->whereNull('cards.card_no')
            ->select('users.name', 'users.lastname', 'users.id as idd', 'cards.card_no')
            ->get();

        return view('livewire.admin.assign-card-component', compact('members'));
    }
}

 // foreach ($this->name as $key => $value) {
 //            Employee::create(['name' => $this->name[$key], 'email' => $this->email[$key]]);
 //        }
