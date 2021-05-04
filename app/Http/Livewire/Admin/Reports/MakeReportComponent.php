<?php

namespace App\Http\Livewire\Admin\Reports;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Models\PayType;
use App\Models\Purpose;

class MakeReportComponent extends Component
{
	public $activity;

    public function render()
    {
    	$purp = Purpose::all();
    	$payt =PayType::all();

        return view('livewire.admin.reports.make-report-component', compact('purp', 'payt'))->layout('layouts.base');
    }

    public function mount(Request $request)
    {
  		$request->activity = "All";
    }
    
    // START member report function
    public function memberReport(Request $request)
	{
		$todate = $request->todate;
		$fromdate = $request->fromdate;
		$activity = $request->activity;
		$today = Carbon::today()->toDateString();
		$agoDate = Carbon::today()->subWeek()->toDateString();
		$date = \Carbon\Carbon::today()->subDays(7)->toDateString();

		switch ($request->input('action')) 
		{
	        case 'view':
			    if ($request->activity == 'today') 
		        {
		        	$users = DB::table('users')
		        		->join('profiles', 'profiles.user_id', '=', 'users.id')
		        		->join('pledges', 'pledges.user_id', '=', 'users.id')
		        		->select('users.*', 'profiles.*', 'users.email as emaill','pledges.*', 'users.id as uid', 'pledges.id as puid')
		        		->groupBy('puid')
		        		->whereDate('last_seen',$today)
		        		->orWhere('pledges.amount', NULL)
		            	->get();
		            $userCount = $users->count();

		            return view('livewire.admin.reports.member-report-component', compact('todate','fromdate', 'users', 'userCount','agoDate', 'today'));
				}

				else if ($request->activity == 'week') {
					$users = DB::table('users')
						->join('profiles', 'profiles.user_id', '=', 'users.id')
						->join('pledges', 'pledges.user_id', '=', 'users.id')
		        		->select('users.*', 'profiles.*', 'users.email as emaill','pledges.*', 'users.id as uid', 'pledges.id as puid')
		        		->whereBetween('last_seen', [$agoDate, $today])
		           		// ->whereDate('last_seen', '<=', $date)
		           		->get();

		           	$userCount = $users->count();

		           	return view('livewire.admin.reports.member-report-component', compact('todate','fromdate', 'users', 'userCount','agoDate', 'today'));
				}

				else 
				{
					$users = DB::table('users')
						->join('profiles', 'profiles.user_id', '=', 'users.id')
						->join('pledges', 'pledges.user_id', '=', 'users.id')
		        		->select('users.*', 'profiles.*', 'users.email as emaill','pledges.*', 'users.id as uid', 'pledges.id as puid')
		           		->whereBetween('users.created_at', [$fromdate, $todate])
		           		->get();

		        	$userCount = $users->count();
		        	return view('livewire.admin.reports.member-report-component', compact('todate','fromdate', 'users', 'userCount','agoDate', 'today'));
				}
	            // VIEW model
	            break;

	        case 'pdf':
		        if ($request->activity == 'today') 
			        {
			        	$users = DB::table('users')
			        		->join('profiles', 'profiles.user_id', '=', 'users.id')
			        		->join('pledges', 'pledges.user_id', '=', 'users.id')
			        		->select('users.*', 'profiles.*', 'users.email as emaill','pledges.*', 'users.id as uid', 'pledges.id as puid')
			        		->groupBy('puid')
			        		->whereDate('last_seen',$today)
			        		->orWhere('pledges.amount', NULL)
			            	->get();
			            $userCount = $users->count();

			            $pdf = PDF::loadView('livewire.admin.reports.user-report-component',compact('today','users','todate','fromdate','agoDate','date','userCount'));
		    			return $pdf->stream('users.pdf');
					}

					else if ($request->activity == 'week') {
						$users = DB::table('users')
							->join('profiles', 'profiles.user_id', '=', 'users.id')
							->join('pledges', 'pledges.user_id', '=', 'users.id')
			        		->select('users.*', 'profiles.*', 'users.email as emaill','pledges.*', 'users.id as uid', 'pledges.id as puid')
			        		->whereBetween('last_seen', [$agoDate, $today])
			           		// ->whereDate('last_seen', '<=', $date)
			           		->get();

			           	$userCount = $users->count();

			           	$pdf = PDF::loadView('livewire.admin.reports.user-report-component',compact('today','users','todate','fromdate','agoDate','date','userCount'));
		    			return $pdf->stream('users.pdf');
					}

					else 
					{
						$users = DB::table('users')
							->join('profiles', 'profiles.user_id', '=', 'users.id')
							->join('pledges', 'pledges.user_id', '=', 'users.id')
			        		->select('users.*', 'profiles.*', 'users.email as emaill','pledges.*', 'users.id as uid', 'pledges.id as puid')
			           		->whereBetween('users.created_at', [$fromdate, $todate])
			           		->get();

			        	$userCount = $users->count();
			        	$pdf = PDF::loadView('livewire.admin.reports.user-report-component',compact('today','users','todate','fromdate','agoDate','date','userCount'));
		    			return $pdf->stream('users.pdf');
					}
		            // PDF model
		            break;
    	}
	}

	// END of member report function


	// START of Pledge report function

	public function pledgeReport(Request $request)
	{
		$today = Carbon::today()->toDateString();
		$todate = $request->todate;
		$fromdate = $request->fromdate;

		switch ($request->input('action')) 
	{
        case 'view':
	        if ($request->activity)
			{
				$pledges = DB::table('pledges')
					->join('purposes', 'purposes.id', '=', 'pledges.purpose_id')
					->leftJoin('users', 'users.id', '=','pledges.user_id')
					->leftJoin('payments', 'payments.pledge_id', '=', 'pledges.id')
					 ->leftJoin('profiles', 'profiles.user_id', '=', 'users.id')
					->select(['pledges.*', 'users.email as emaill', 'pledges.amount as amnt', 'profiles.*', 'users.*', 'purposes.*', 'pledges.created_at as crtat',  DB::raw("SUM(payments.amount) as pamount")])
					->groupBy('payments.pledge_id')
					->where('purposes.id', '=', $request->activity)
					->get();

				$pledgeCount = $pledges->count();

				$totalpledge = DB::table('pledges')
					->join('purposes', 'purposes.id', '=', 'pledges.purpose_id')
					->where('purposes.id', '=', $request->activity)
					->sum('amount');

			return view('livewire.admin.reports.pledge-report-component', compact('today','pledges', 'pledgeCount', 'totalpledge'));
			}

			else if ($request->activity && $request->fromdate && $request->todate) 
			{
				$pledges = DB::table('pledges')
					->join('purposes', 'purposes.id', '=', 'pledges.purpose_id')
					->leftJoin('users', 'users.id', '=','pledges.user_id')
					->leftJoin('payments', 'payments.pledge_id', '=', 'pledges.id')
					->leftJoin('profiles', 'profiles.user_id', '=', 'users.id')
					->select(['pledges.*', 'users.email as emaill', 'pledges.amount as amnt', 'profiles.*', 'users.*', 'purposes.*', 'pledges.created_at as crtat',  DB::raw("SUM(payments.amount) as pamount")])
					->groupBy('payments.pledge_id')
					->whereBetween('pledges.created_at', [$fromdate,$todate])
					->where('purposes.id', '=', $request->activity)
					->get();

				$pledgeCount = $pledges->count();

				$totalpledge = DB::table('pledges')
					->join('purposes', 'purposes.id', '=', 'pledges.purpose_id')
					->leftJoin('users', 'users.id', '=','pledges.user_id')
					->whereBetween('pledges.created_at', [$fromdate,$todate])
					->where('purposes.id', '=', $request->activity)
					->sum('amount');

			return view('livewire.admin.reports.pledge-report-component', compact('today','pledges', 'pledgeCount', 'totalpledge'));
			}

			else
			{
				$pledges = DB::table('pledges')
					->join('purposes', 'purposes.id', '=', 'pledges.purpose_id')
					->leftJoin('users', 'users.id', '=','pledges.user_id')
					->leftJoin('payments', 'payments.pledge_id', '=', 'pledges.id')
					 ->leftJoin('profiles', 'profiles.user_id', '=', 'users.id')
					->select(['pledges.*', 'users.email as emaill', 'pledges.amount as amnt', 'profiles.*', 'users.*', 'purposes.*', 'pledges.created_at as crtat',  DB::raw("SUM(payments.amount) as pamount")])
					->groupBy('payments.pledge_id')
					->whereBetween('pledges.created_at', [$fromdate,$todate])
					->get();

				$pledgeCount = $pledges->count();

				$totalpledge = DB::table('pledges')
					->join('purposes', 'purposes.id', '=', 'pledges.purpose_id')
					->leftJoin('users', 'users.id', '=','pledges.user_id')
					->whereBetween('pledges.created_at', [$fromdate,$todate])
					->sum('amount');

			return view('livewire.admin.reports.pledge-report-component', compact('today','pledges', 'pledgeCount', 'totalpledge'));
			}
            // Save model
            break;

        case 'pdf':
         if ($request->activity)
			{
				$pledges = DB::table('pledges')
					->join('purposes', 'purposes.id', '=', 'pledges.purpose_id')
					->leftJoin('users', 'users.id', '=','pledges.user_id')
					->leftJoin('payments', 'payments.pledge_id', '=', 'pledges.id')
					 ->leftJoin('profiles', 'profiles.user_id', '=', 'users.id')
					->select(['pledges.*', 'users.email as emaill', 'pledges.amount as amnt', 'profiles.*', 'users.*', 'purposes.*', 'pledges.created_at as crtat',  DB::raw("SUM(payments.amount) as pamount")])
					->groupBy('payments.pledge_id')
					->where('purposes.id', '=', $request->activity)
					->get();

				$pledgeCount = $pledges->count();

				$totalpledge = DB::table('pledges')
					->join('purposes', 'purposes.id', '=', 'pledges.purpose_id')
					->where('purposes.id', '=', $request->activity)
					->sum('amount');
					
				$pdf = PDF::loadView('livewire.admin.reports.pledgepdf-report-component', compact('today','pledges', 'pledgeCount', 'totalpledge'));
    			return $pdf->stream('pledge.pdf');
			}

			else if ($request->activity && $request->fromdate && $request->todate) 
			{
				$pledges = DB::table('pledges')
					->join('purposes', 'purposes.id', '=', 'pledges.purpose_id')
					->leftJoin('users', 'users.id', '=','pledges.user_id')
					->leftJoin('payments', 'payments.pledge_id', '=', 'pledges.id')
					->leftJoin('profiles', 'profiles.user_id', '=', 'users.id')
					->select(['pledges.*', 'users.email as emaill', 'pledges.amount as amnt', 'profiles.*', 'users.*', 'purposes.*', 'pledges.created_at as crtat',  DB::raw("SUM(payments.amount) as pamount")])
					->groupBy('payments.pledge_id')
					->whereBetween('pledges.created_at', [$fromdate,$todate])
					->where('purposes.id', '=', $request->activity)
					->get();

				$pledgeCount = $pledges->count();

				$totalpledge = DB::table('pledges')
					->join('purposes', 'purposes.id', '=', 'pledges.purpose_id')
					->leftJoin('users', 'users.id', '=','pledges.user_id')
					->whereBetween('pledges.created_at', [$fromdate,$todate])
					->where('purposes.id', '=', $request->activity)
					->sum('amount');

				$pdf = PDF::loadView('livewire.admin.reports.pledgepdf-report-component', compact('today','pledges', 'pledgeCount', 'totalpledge'));
    			return $pdf->stream('pledge.pdf');
			}

			else
			{
				$pledges = DB::table('pledges')
					->join('purposes', 'purposes.id', '=', 'pledges.purpose_id')
					->leftJoin('users', 'users.id', '=','pledges.user_id')
					->leftJoin('payments', 'payments.pledge_id', '=', 'pledges.id')
					 ->leftJoin('profiles', 'profiles.user_id', '=', 'users.id')
					->select(['pledges.*', 'users.email as emaill', 'pledges.amount as amnt', 'profiles.*', 'users.*', 'purposes.*', 'pledges.created_at as crtat',  DB::raw("SUM(payments.amount) as pamount")])
					->groupBy('payments.pledge_id')
					->whereBetween('pledges.created_at', [$fromdate,$todate])
					->get();

				$pledgeCount = $pledges->count();

				$totalpledge = DB::table('pledges')
					->join('purposes', 'purposes.id', '=', 'pledges.purpose_id')
					->leftJoin('users', 'users.id', '=','pledges.user_id')
					->whereBetween('pledges.created_at', [$fromdate,$todate])
					->sum('amount');

				$pdf = PDF::loadView('livewire.admin.reports.pledgepdf-report-component', compact('today','pledges', 'pledgeCount', 'totalpledge'));
    			return $pdf->stream('pledge.pdf');
			}
            // Preview model
            break;
    }
		

		
		
	}
	// END of pledge report function


	// START of payment report function
	public function paymentReport(Request $request)
	{
		$today = Carbon::today()->toDateString();
		$todate = $request->todate;
		$fromdate = $request->fromdate;

		switch ($request->input('action')) 
		{
	        case 'view':
	         if ($request->activity)
		        {
		        	$payments = DB::table('payments')
		            	->join('pledges', 'pledges.id', '=', 'payments.pledge_id')
		            	->join('users', 'users.id', '=', 'pledges.user_id')
		            	->join('pay_types', 'pay_types.id', '=', 'payments.paytype')
		            	->join('purposes', 'purposes.id', '=', 'payments.purpose_id')
		            	->where('pay_types.id', $request->activity)
		            	->select('payments.amount as amnt', 'users.*', 'pay_types.*', 'purposes.*', 'payments.*')
		            	->get();

		            	$paymentCount = $payments->count();

		            	$paytotal = DB::table('payments')
		            	->join('pledges', 'pledges.id', '=', 'payments.pledge_id')
		            	->join('users', 'users.id', '=', 'pledges.user_id')
		            	->join('pay_types', 'pay_types.id', '=', 'payments.paytype')
		            	->join('purposes', 'purposes.id', '=', 'payments.purpose_id')
		            	->where('pay_types.id', $request->activity)
		            	->select('payments.amount as amnt', 'users.*', 'pay_types.*', 'purposes.*', 'payments.*')
		            	->sum('payments.amount');
		        	return view('livewire.admin.reports.payments-report-component', compact('today', 'payments', 'paymentCount','paytotal'));
		        }
		        else
		        {
		        	$payments = DB::table('payments')
		            	->join('pledges', 'pledges.id', '=', 'payments.pledge_id')
		            	->join('users', 'users.id', '=', 'pledges.user_id')
		            	->join('pay_types', 'pay_types.id', '=', 'payments.paytype')
		            	->join('purposes', 'purposes.id', '=', 'payments.purpose_id')
		            	->whereBetween('payments.created_at', [$fromdate,$todate])
		            	->select('payments.amount as amnt', 'users.*', 'pay_types.*', 'purposes.*', 'payments.*')
		            	->get();

		        	$paymentCount = $payments->count();

		        	$paytotal = DB::table('payments')
		            	->join('pledges', 'pledges.id', '=', 'payments.pledge_id')
		            	->join('users', 'users.id', '=', 'pledges.user_id')
		            	->join('pay_types', 'pay_types.id', '=', 'payments.paytype')
		            	->join('purposes', 'purposes.id', '=', 'payments.purpose_id')
		            	->whereBetween('payments.created_at', [$fromdate,$todate])
		            	->select('payments.amount as amnt', 'users.*', 'pay_types.*', 'purposes.*', 'payments.*')
		            	->sum('payments.amount');
		        	return view('livewire.admin.reports.payments-report-component', compact('today', 'payments', 'paymentCount','paytotal'));

		        }
	            // Save model
	            break;

	        case 'pdf':
	        	if ($request->activity)
			        {
			        	$payments = DB::table('payments')
			            	->join('pledges', 'pledges.id', '=', 'payments.pledge_id')
			            	->join('users', 'users.id', '=', 'pledges.user_id')
			            	->join('pay_types', 'pay_types.id', '=', 'payments.paytype')
			            	->join('purposes', 'purposes.id', '=', 'payments.purpose_id')
			            	->where('pay_types.id', $request->activity)
			            	->select('payments.amount as amnt', 'users.*', 'pay_types.*', 'purposes.*', 'payments.*')
			            	->get();

			            	$paymentCount = $payments->count();

			            	$paytotal = DB::table('payments')
			            	->join('pledges', 'pledges.id', '=', 'payments.pledge_id')
			            	->join('users', 'users.id', '=', 'pledges.user_id')
			            	->join('pay_types', 'pay_types.id', '=', 'payments.paytype')
			            	->join('purposes', 'purposes.id', '=', 'payments.purpose_id')
			            	->where('pay_types.id', $request->activity)
			            	->select('payments.amount as amnt', 'users.*', 'pay_types.*', 'purposes.*', 'payments.*')
			            	->sum('payments.amount');
			        	$pdf = PDF::loadView('livewire.admin.reports.paymentspdf-report-component', array('today'=> $today, 'payments'=>$payments, 'paytotal'=>$paytotal, 'paymentCount'=>$paymentCount));
			        	return $pdf->stream('payments.pdf');
			        }
		        else
			        {
			        	$payments = DB::table('payments')
			            	->join('pledges', 'pledges.id', '=', 'payments.pledge_id')
			            	->join('users', 'users.id', '=', 'pledges.user_id')
			            	->join('pay_types', 'pay_types.id', '=', 'payments.paytype')
			            	->join('purposes', 'purposes.id', '=', 'payments.purpose_id')
			            	->whereBetween('payments.created_at', [$fromdate,$todate])
			            	->select('payments.amount as amnt', 'users.*', 'pay_types.*', 'purposes.*', 'payments.*')
			            	->get();

			        	$paymentCount = $payments->count();

			        	$paytotal = DB::table('payments')
			            	->join('pledges', 'pledges.id', '=', 'payments.pledge_id')
			            	->join('users', 'users.id', '=', 'pledges.user_id')
			            	->join('pay_types', 'pay_types.id', '=', 'payments.paytype')
			            	->join('purposes', 'purposes.id', '=', 'payments.purpose_id')
			            	->whereBetween('payments.created_at', [$fromdate,$todate])
			            	->select('payments.amount as amnt', 'users.*', 'pay_types.*', 'purposes.*', 'payments.*')
			            	->sum('payments.amount');
		        	    $pdf = PDF::loadView('livewire.admin.reports.paymentspdf-report-component', array('today'=> $today, 'payments'=>$payments, 'paytotal'=>$paytotal, 'paymentCount'=>$paymentCount));
		        	    return $pdf->stream('payments.pdf');
			        }

	            // Preview model
	            break;
    	}
		
       
	}
}