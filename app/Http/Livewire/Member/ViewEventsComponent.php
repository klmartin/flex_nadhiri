<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use App\Models\Event;
use Carbon\Carbon;

class ViewEventsComponent extends Component
{
	public function deleteEvent($id)
	{
		$event = Event::find($id);
		$event->delete();
		session()->Flash('message', 'The Event Has Been Deleted Succesfully');

	}
    public function render()
    {
    	$event = Event::all();
        return view('livewire.member.view-events-component', ['event'=>$event]);
    }
}
