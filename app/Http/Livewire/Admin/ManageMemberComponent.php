<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Http\Request;
use Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ManageMemberComponent extends Component
{
    use WithPagination;
	public $searchTerm, $period, $rows; 

	
    public function mount()
    {
        $this->period = "default";
        $this->rows = 10;
    }


    public function deleteMember($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->Flash('message', 'Member Has Been Deleted Succesfully');

    }

    public function render()
    {
        if ($this->period== 'monthly')
        {
            $searchTerm = '%'.$this->searchTerm.'%';
            $users = DB::table('users')
                ->leftJoin('profiles','profiles.user_id','=','users.id')
                ->whereMonth('users.created_at', Carbon::now()->month)
                ->where('name', 'like', $searchTerm)
                ->select('users.*', 'profiles.*', 'users.email as emaill', 'users.id as idd')
                ->paginate($this->rows);
            
            }

        else if ($this->period== 'threemon')
        {
            $date = \Carbon\Carbon::now()->startOfMonth()->subMonth(3);
            $searchTerm = '%'.$this->searchTerm.'%';
            $users = DB::table('users')
            ->leftJoin('profiles','profiles.user_id','=','users.id')
            ->whereMonth('users.created_at', '>=', $date)
             ->where('name', 'like', $searchTerm)
            ->select('users.*', 'profiles.*', 'users.email as emaill', 'users.id as idd')
            ->paginate($this->rows);
        }

        else if ($this->period== 'sixmon')
        {
            $date = \Carbon\Carbon::now()->startOfMonth()->subMonth(6);
            $searchTerm = '%'.$this->searchTerm.'%';
            $users = DB::table('users')
            ->leftJoin('profiles','profiles.user_id','=','users.id')
            ->whereMonth('users.created_at', '<=', $date)
             ->where('name', 'like', $searchTerm)
            ->select('users.*', 'profiles.*', 'users.email as emaill', 'users.id as idd')
            ->paginate($this->rows);
        }

        else
        {
            $searchTerm = '%'.$this->searchTerm.'%';
            $users = DB::table('users')
            ->leftJoin('profiles','profiles.user_id','=','users.id')
            ->where('name', 'like', $searchTerm)
            ->select('users.*', 'profiles.*', 'users.email as emaill', 'users.id as idd')
            ->paginate($this->rows);
        }
    	
        return view('livewire.admin.manage-member-component', ['users'=>$users])->layout('layouts.base');
    }
}
  
