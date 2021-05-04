<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Payment;
use App\Models\PayType;
Use App\Models\Pledge;
use App\Models\Purpose;
use App\Models\User;
use App\Models\Card;
use Illuminate\Support\Facades\DB;


class AddPayementComponent extends Component
{
	public $ref_no, $paytype, $amount, $date, $purpose_id, $cards, $card_id, $name, $pledg, $pledge_id;

	public $selectedCard = NULL;

	public function storePayement()
	{
		try
		{
			$payment = new Payment();
			$payment->ref_no = $this->ref_no;
			$payment->paytype = $this->paytype;
			$payment->user_id = $this->selectedCard;
			$payment->pledge_id = $this->pledge_id;
			$payment->card_id =  Card::where('user_id', $this->selectedCard)->value('id');
			$payment->amount = $this->amount;
			$payment->date = $this->date;
			$payment->purpose_id = $this->purpose_id;
			$payment->save();
			session()->flash('message', 'Payment Has Been Added Succesfully');

		}
		catch(\Illuminate\Database\QueryException $ex)
		{
			Session()->flash('message', 'Cannot Add This Payment');
		}
	}

	public function mount()
	{
		$this->name = User::with('pledge')->get();

	  	$this->cards = collect();
	}

	public function updatedSelectedCard($name)
	{
		if (!is_null($name))
		{
			$this->cards = Card::where('user_id', $name)->get();
			$this->pledg = Pledge::where('user_id', $name)->get();
			//
		}
	}

    public function render()
    {
    	$paymethod = Paytype::all(); 
    	
    	$viewName = DB::table('users')
	  	    ->join('pledges', 'users.id','=','pledges.user_id')
	  	    ->leftJoin('purposes', 'pledges.id', '=', 'pledges.purpose_id')
	  	    ->select('users.name', 'users.id', 'pledges.amount', 'pledges.id as idd', 'purposes.pname','purposes.id as iddd' )->get();

        return view('livewire.admin.add-payement-component',['paymethod' => $paymethod], ['viewName' => $viewName]  );
    }
}