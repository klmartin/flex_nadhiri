<?php
namespace App\Http\Controllers\Member;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Pledge;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;



class DashboardController extends Controller {
    public function __construct() {
    $this->middleware('auth');
}
    public function index() {

    	$user = Auth::user()->id;

        // $pledgepay = DB::table('payments')
        //     ->join('pledges', 'pledges.id', '=', 'payments.pledge_id')
        //     ->where('pledges.user_id', '=', $user)
        //     ->select('payments.amount as amnt', 'payments.*', 'pledges.*', DB::raw('SUM(payments.amount) As sumamnt'))
        //     ->get();

        // $pledgepay = Payment::select('payments.*', 'pledges.*', DB::raw('SUM(payments.amount) As sumamnt'))
        //  ->leftJoin('pledges', 'pledges.id' , '=','payments.pledge_id')
        //  ->where('pledges.user_id', $user)
        //  ->get();

         // $users = User::select('users*', 'analytics.*', DB::raw('SUM(analytics.revenue) As revenue'))
         // ->leftJoin('analytics', 'analytics.user_id', '=', 'users.id')
         // ->where('analytics.date', Carbon::today()->toDateString())
         // ->get();

    	$pledge = DB::table('pledges')
            ->join('purposes', 'purposes.id', '=', 'pledges.purpose_id')
            ->join('payments', 'payments.pledge_id', '=', 'pledges.id')
            ->where('pledges.user_id', '=', $user)
            ->select('pledges.*', 'purposes.*', 'pledges.amount as pamnt' , DB::raw('SUM(payments.amount) As sumamnt'))
    	    ->get();

        $totpledge = DB::table('pledges')->where('user_id', '=', $user)->sum('amount');

        $image = DB::table('profiles')->where('user_id', '=', $user)->select('image')->first();

        $pledgegiv = DB::table('pledges')
            ->where('pledges.user_id', '=', $user)
            ->join('payments', 'payments.pledge_id', '=', 'pledges.id')
            ->sum('payments.amount');
       
        $diff = ($totpledge - $pledgegiv);
        $perc = null;
        $perc == 0 ? 0 :($pledgegiv/$totpledge*100);
        // if($perc != 0)     
        //      $perc = $pledgegiv/$totpledge*100 ; 
        // else     
        //      $perc = 0;

    //     $perc = null;

    //     if($pledgegiv/$totpledge*100 == 0) {
    //     $perc = "null";
    // }   else {
    //     $perc = ($pledgegiv/$totpledge*100);
    // }
       

        return view ('member.dashboard',  compact('pledge', 'totpledge', 'image', 'pledgegiv', 'diff', 'perc'));
    
  }
}
