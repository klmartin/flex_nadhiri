<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Event;

class ManageEventsComponent extends Component
{
	public $event_name;
	public $message;
	public $event_start;
	public $event_end;

	public function storeEvent()
	{
		$strevent = new Event();
		$strevent->event_name = $this->event_name;
		$strevent->message = $this->message;
		$strevent->event_start = $this->event_start;
		$strevent->event_end = $this->event_end;
		$strevent->save();
		session()->flash('message', 'Event Succesfully Created ! ');
	}
   
    public function render()
    {
    	// $address = file_get_contents('https://ipapi.co/country_calling_code/');

        return view('livewire.admin.manage-events-component')->layout('layouts.base');
    }
}