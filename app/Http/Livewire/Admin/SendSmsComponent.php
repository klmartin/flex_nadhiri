<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use Illuminate\Http\Request;

class SendSmsComponent extends Component
{
	public $mobile, $message;

	public function sendSms()
	{
		$basic  = new \Nexmo\Client\Credentials\Basic('6c650de2', '4FPJyz2ZxsmVcGRe');
        $client = new \Nexmo\Client($basic);
		$message = $client->message()->send([
   		'to'   => $this->mobile,
    	'from' => '16105552344',
    	'text' => $this->message
]);
		session()->Flash('message', 'Message Sent Successfully!');
	}
    public function render()
    {
        return view('livewire.admin.send-sms-component');
    }
}



