<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Session\SessionManager;
use Illuminate\Routing\Redirector;
use App\Http\Livewire\Admin\AdminViewPledgeComponent;
use App\Http\Livewire\Admin\AddPayementComponent;
use App\Http\Livewire\Admin\ManagePurposesComponent;
use App\Http\Livewire\Admin\ManageMemberComponent;
use App\Http\Livewire\Admin\ManagePaymentsComponent;
use App\Http\Livewire\Admin\ManageEventsComponent;
use App\Http\Livewire\Admin\Reports\UserReportComponent;
use App\Http\Livewire\Member\ManageProfileComponent;
use App\Http\Livewire\Member\AddPledgeComponent;
use App\Http\Livewire\Admin\Reports\MakeReportComponent;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Group For Admin

Route::group(['middleware'=>'role:admin'],function(){ 

Route::get('/admin-dashboard', 'App\Http\Controllers\Admin\DashboardController@index');

Route::get('/admin-dashboard', 'App\Http\Controllers\ChartController@index');

Route::get('/view-pledges', AdminViewPledgeComponent::class,  AddPayementComponent::class, ManagePurposesComponent::class)->name('AdminViewPledge');

Route::get('/manage-payments', ManagePaymentsComponent::class)->name('manage-payments');

Route::get('/manage-events', ManageEventsComponent::class)->name('manage-events');

Route::get('/manage-members', ManageMemberComponent::class)->name('manage-member');

Route::get('/make-report', MakeReportComponent::class)->name('make-report');

Route::post('/make-reportA', [MakeReportComponent::class, 'memberReport'])->name('memberReport');

Route::post('/make-reportB', [MakeReportComponent::class, 'pledgeReport'])->name('pledgeReport');

Route::post('/make-reportC', [MakeReportComponent::class, 'paymentReport'])->name('paymentReport');

Route::get('/download-pdfA', [MakeReportComponent::class, 'MemberPdf'])->name('download-pdfA');

Route::get('/download-pdfB', [MakeReportComponent::class, 'PledgePdf'])->name('download-pdfB');

Route::get('/download-pdfC', [MakeReportComponent::class, 'PaymentPdf'])->name('download-pdfC');

});

//Route Group For Member

Route::group(['middleware'=>'role:member'],function(){ 

	Route::get ('/member-dashboard', 'App\Http\Controllers\Member\DashboardController@index')->name('member-dashboard');

	Route::get('/member-profile', ManageProfileComponent::class )->name('member-profile');

   
});
