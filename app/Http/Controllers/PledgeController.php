<?php
namespace App\Http\Controllers;

use App\Models\Pledge;
use Illuminate\Http\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Carbon\Carbon;


class PledgeController extends Controller
{
   
    // public function create()
    // {
    //     return view('member-dashboard');
    // }

  
    public function pledgeStore(Request $request)
    {
        $user = Auth::user()->id;
        $request->validate([
            'amount' => 'required',
            'purpose' => 'required'
        ]);

        $pledge = Pledge::create([
        'amount'=>request('amount'),
        'user_id'=>$user,
        'purpose'=>request('purpose')

           ]);
      // \Session::flush('member-dashboard','Pledge Is successfully Made');
      // return back();

        return redirect()->route('member-dashboard')
            ->with('success', 'Product created successfully.');
    }

}

 