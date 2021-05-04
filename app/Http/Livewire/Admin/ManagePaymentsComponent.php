<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Payment;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ManagePaymentsComponent extends Component
{
    use WithPagination;

    public $searchTerm, $rows, $period;

    public function mount()
    {
         $this->rows = 10;
    }

    public function deletePayment($id)
    {
        $pay = Payment::find($id);
        $pay->delete();
        session()->Flash('message', 'Payment Has Been Deleted');
    }

    public function render()
    {
        if ($this->period=='monthly') 
        {
                # code...
            $searchTerm = '%'.$this->searchTerm.'%';
            $pay = DB::table('payments')
                ->leftJoin('pledges', 'payments.pledge_id', '=', 'pledges.id')
                ->join('users', 'users.id', '=', 'payments.user_id')
                ->leftJoin('profiles', 'profiles.user_id', '=', 'users.id')
                ->join('pay_types', 'pay_types.id', '=', 'payments.paytype')
                ->whereMonth('payments.created_at', Carbon::now()->month)
                ->join('purposes', 'purposes.id', '=', 'payments.purpose_id')
                ->where('users.name', 'like', $searchTerm)
                ->orWhere('purposes.pname', 'like', $searchTerm)
                ->select('payments.*', 'users.*', 'pledges.amount', 'pay_types.pay_name', 'pledges.amount','payments.amount as pamount', 'purposes.*', 'profiles.*', 'payments.id as idd')
                ->paginate($this->rows);
        }

        else if ($this->period=='today')
        {
            $searchTerm = '%'.$this->searchTerm.'%';
            $pay = DB::table('payments')
                ->leftJoin('pledges', 'payments.pledge_id', '=', 'pledges.id')
                ->join('users', 'users.id', '=', 'payments.user_id')
                ->leftJoin('profiles', 'profiles.user_id', '=', 'users.id')
                ->join('pay_types', 'pay_types.id', '=', 'payments.paytype')
                ->whereDate('payments.created_at', Carbon::today()->toDateString())
                ->join('purposes', 'purposes.id', '=', 'payments.purpose_id')
                ->where('users.name', 'like', $searchTerm)
                ->orWhere('purposes.pname', 'like', $searchTerm)
                ->select('payments.*', 'users.*', 'pledges.amount', 'pay_types.pay_name', 'pledges.amount','payments.amount as pamount', 'purposes.*', 'profiles.*', 'payments.id as idd')
                ->paginate($this->rows);
        }

        else
        {
            $searchTerm = '%'.$this->searchTerm.'%';
            $pay = DB::table('payments')
                ->leftJoin('pledges', 'payments.pledge_id', '=', 'pledges.id')
                ->join('users', 'users.id', '=', 'payments.user_id')
                ->leftJoin('profiles', 'profiles.user_id', '=', 'users.id')
                ->join('pay_types', 'pay_types.id', '=', 'payments.paytype')
                ->join('purposes', 'purposes.id', '=', 'payments.purpose_id')
                ->where('users.name', 'like', $searchTerm)
                ->orWhere('purposes.pname', 'like', $searchTerm)
                ->select('payments.*', 'users.*', 'pledges.amount', 'pay_types.pay_name', 'pledges.amount','payments.amount as pamount', 'purposes.*', 'profiles.*', 'payments.id as idd')
                ->paginate($this->rows);
        }

       
        return view('livewire.admin.manage-payments-component', ['pay'=>$pay])->layout('layouts.base');
    }
}
