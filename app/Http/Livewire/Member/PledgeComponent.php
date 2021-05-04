<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;

class PledgeComponent extends Component
{
    public function render()
    {
        return view('livewire.member.pledge-component')->layout('layouts.basee');
    }
}
