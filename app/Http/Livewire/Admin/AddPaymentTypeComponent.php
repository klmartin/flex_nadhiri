<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\PayType;
use Livewire\WithPagination;
Use Exception;

class AddPaymentTypeComponent extends Component
{
	use WithPagination;
	public $pay_name;

	public function deletePayType($id)
	{
		try{
		$typesh = payType::find($id);
		$typesh->delete();
		session()->Flash('message', 'Payment Type Has Been Delted');
	}
	catch(\Illuminate\Database\QueryException $ex)
	{
		session()->Flash('message', 'Cannot Delete This Form Of Payment');
	}

	}


	public function storePayType(){
		$type = new PayType();
		$type->pay_name = $this->pay_name;
		$type->save();
		session()->Flash('message', 'The Payment Type Has Been Successfully Added!');
	}

    public function render()
    {
    	$typesh = payType::paginate(5);
        return view('livewire.admin.add-payment-type-component', ['payType'=> $typesh]);
    }
}
