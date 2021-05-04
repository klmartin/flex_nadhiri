<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\models\Payment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChartController extends Controller
{
    //
    
     public function __construct() {
    $this->middleware('auth');
  }

    public function index(){

    	$users = User::select(DB::raw("COUNT(*)as count"))
    	   ->whereYear('created_at', date('Y'))
    	   ->groupBy(DB::raw("Month(created_at)"))
    	   ->pluck('count');
    	$months = User::select(DB::raw("Month(created_at) as month"))
    	   ->whereYear('created_at', date('Y'))
    	   ->groupBy(DB::raw("Month(created_at)"))
    	   ->pluck('month');

    	$datas  = array(0,0,0,0,0,0,0,0,0,0,0,0);
    	foreach ($months as $index => $month)
    	    {
    	      # code...
    	      $datas[$month] = $users[$index];
    	    }


        $pays = Payment::select(DB::raw("SUM(amount)as count")) //this is the line of code for sum.
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
        $miezi = Payment::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $datap  = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($miezi as $index => $miezis)
        {
            # code...
            $datap[$miezis] = $pays[$index];
        }

        $users = DB::table('users')->count();

        $pymnttotal = DB::table('payments')->sum('amount');

        $totalpledge = DB::table('pledges')->sum('amount');

        $paymonth = DB::table('payments')->whereMonth('created_at', Carbon::now()->month)->sum('amount');

        //   $paymonth =  Payment::select( DB::raw('SUM(payments.amount) As sumamnt'))
        // ->whereMonth('created_at', Carbon::now()->month)
        // ->first();

        return view('admin.dashboard', compact('users','datas', 'datap', 'totalpledge', 'pymnttotal', 'paymonth'));

    }

}
