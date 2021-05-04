<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use Auth;
use App\Models\Pledge;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use App\Models\profile;

class ManageProfileComponent extends Component
{
    use WithFileUploads;
    public $user_id, $first_name, $last_name, $status, $street, $city, $country, $zip_code, $phone_no, $email, $image, $sex, $dob, $countryy, $countrycode;

    public function saveProfile(){
        $countrycode = '+255';
        $user = Auth::user()->id;
        $uname = Auth::user()->name;
        $profile = new profile();
        $profile->user_id = $user;
        // $profile->first_name = $this->first_name;
        // $profile->last_name = $this->last_name;
        $profile->status = $this->status;
        $profile->street = $this->street;
        $profile->city = $this->city;
        $profile->country = $this->country;
        $profile->zip_code = $this->zip_code;
        // $profile->phone_no = $countrycode.$this->phone_no;
        // $profile->email = $this->email;
        $profile->sex = $this->sex;
        $profile->dob = $this->dob;
        $imageName = $uname.'.'.$this->image->extension();
        $this->image->storeAs('profiles', $imageName);
        $profile->image = $imageName;
        $profile->save();

        session()->Flash('message', 'Profile Saved!');

    }

    public function mount()
    {
        $user  = Auth::user()->id;
        $profiles = User::where('id', $user)->first();
        $this->first_name = $profiles->name;
        $this->last_name = $profiles->lastname;
        $this->email = $profiles->email;
        $this->phone_no = $profiles->phone_no;
    }
	

    public function render()
    {
    	$user  = Auth::user()->id;
    	$users = DB::table('users')
            ->where('id', '=', $user)
            ->get();

        $image = DB::table('profiles')->select('image')->where('user_id', '=', $user);

        $pledge = DB::table('pledges')
    		->where('pledges.user_id', '=', $user)
        	->join('payments', 'payments.pledge_id', '=', 'pledges.id')
        	->sum('payments.amount');
	

        $totpledge = DB::table('pledges')->where('user_id', '=', $user)->sum('amount');

        $profiles = DB::table('profiles')
            ->join('users', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', '=', $user)
            ->select('profiles.*', 'users.*', 'profiles.image', 'users.name as fname','users.email as emaill')
            ->first();

        $pledgeperc = null;

        if($pledge == 0) 
        {
         $pledgeperc = '0';
        } 
        else 
        {
          $pledgeperc = $pledge/$totpledge*100;
        }

        return view('livewire.member.manage-profile-component',['users'=>$users, 'totpledge'=>$totpledge, 'profiles'=>$profiles], compact('pledge', 'image', 'pledgeperc'))->layout('layouts.base');
    }
}

  // $countrycode = file_get_contents('https://ipapi.co/country_calling_code/');
        // $countryy = file_get_contents('https://ipapi.co/country_name/');
        // $region = file_get_contents('https://ipapi.co/region/');    


    // $amountgiven = DB::table('payments')
        //     ->where('user_id', '=', $user)
        //     ->join('pledges', 'pledges.id', '=', 'payments.pledge_id')
        //     ->select(DB::raw('payments.*,(pledges.amount - payments.amount) as amntgiven'))
        //     ->get();
     //    $progress = DB::table('payments')
     //        ->where('user_id', '=', $user)
     //        ->join('pledges', 'pledges.id', '=', 'payments.pledge_id')
     //        ->select(DB::raw('(pledges.amount/payments.amount)*10  as progress'))
     //        ->get();