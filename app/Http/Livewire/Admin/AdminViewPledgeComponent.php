<?php

namespace App\Http\Livewire\Admin;
use App\Models\Pledge;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminViewPledgeComponent extends Component
{

  use WithPagination;
	public $total, $rows, $searchTerm;

	public function namegen()
	{
		$pname = DB::table('users')
        ->select('name')
        ->get();

	}

  public function deletePledge($id)
  {
    $pledges = Pledge::find($id);
    $pledges->delete();
    session()->Flash('message', 'The Pledge Has Been Deleted Succesfully');
  }

  public function mount()
  {

    $this->rows = 10;
  }

  public function render()
  {
      $searchTerm = '%'.$this->searchTerm.'%';
    
      $style_values = 20;

    	$pledges = DB::table('pledges')
          ->join('users', 'users.id','=','pledges.user_id')
          ->join('purposes', 'purposes.id','=','pledges.purpose_id')
          ->leftJoin('profiles', 'profiles.user_id', '=', 'users.id')
          ->leftJoin('payments', 'payments.pledge_id', '=', 'pledges.id')
    	    ->select(['users.name', 'users.phone_no','pledges.amount as amnt','pledges.id as idd', 'purposes.pname', 'profiles.*', 'users.email as emaill', 'pledges.created_at as crtat', DB::raw("SUM(payments.amount) as pamount")], 'payments.*', 'payments.created_at as pymntcreated_at')
          ->groupBy('payments.pledge_id')
          ->where('name', 'like', $searchTerm)
          ->orWhere('pname', 'like', $searchTerm)
          ->paginate($this->rows);
        return view('livewire.admin.admin-view-pledge-component', ['pledges' => $pledges], ['style_values'=>$style_values])->layout('layouts.base');
  }
}