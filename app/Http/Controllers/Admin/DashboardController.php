<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;


class DashboardController extends Controller {

    public function __construct() {
    $this->middleware('auth');

  }


    public function index() {
    return view('admin.dashboard');
  }

  public function pledge()
  {
  	$viewPledge = DB::table('users')
  	   ->join('pledges', 'users.id','=','pledges.user_id')
  	   ->select('users.name','pledges.amount','pledges.purpose')->get();

    $paymonth =  Payment::select( DB::raw('SUM(payments.amount) As sumamnt'))
        ->whereMonth('created_at', Carbon::now()->month)
        ->get();
   

  	return view('admin.viewpledges', compact('viewPledge', 'paymonth'));
  }

}