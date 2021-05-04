<?php

namespace App\Http\Livewire\Admin\Reports;

use Livewire\Component;
use App\Models\User;
use PDF;

class UserReportComponent extends Component
{
    public function render()
    {
       $users = User::all();
        return view('livewire.admin.reports.user-report-component', compact('users'))->layout('layouts.base');
    }

    public function downloadPdf()
    {
    	$users = User::all();
    	$pdf = PDF::loadView('livewire.admin.reports.user-report-component', compact('users'));
    	return $pdf->download('users.pdf');
    }
}
