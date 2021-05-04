<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;

class MemberCardComponent extends Component
{
    public function render()
    {
        return view('livewire.member.member-card-component')->layout('layouts.base');
    }
}
