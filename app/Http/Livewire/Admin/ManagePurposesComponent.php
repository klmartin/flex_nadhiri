<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Purpose;

class ManagePurposesComponent extends Component
{
	public $pname, $description,$expdate;

	public function deletePurposes($id)
	{
		$purp = Purpose::find($id);
		$purp->delete();
		session()->Flash('message', 'Purposes Has Been Delted');
	}

	public function storePurpose(){
		$purp = new Purpose();
		$purp->pname = $this->pname;
		$purp->description = $this->description;
		$purp->expdate = $this->expdate;
		$purp->save();
		session()->Flash('message', 'The Purpose Has Been Successfully Added!');
	}
    public function render()
    {
    	$purp = Purpose::all();
        return view('livewire.admin.manage-purposes-component', compact('purp'));
    }
}
