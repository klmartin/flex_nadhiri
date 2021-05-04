	
<div>
	<form wire:submit.prevent="saveProfile"  enctype="multipart/form-data">
			 	@if(Session::has('message'))
    			<div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
    			@endif
              	@csrf
   <div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<div class="text-center">
						@isset($image)
 					 <img src="{{asset('assets/images/profiles')}}/{{$image}}" alt="{{$image}}" class="rounded-circle" width="150"> @endisset 
 					 @empty($images)
 					  <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
 					 @endempty
					 <h6>Upload a different photo...</h6>
         
         		 <input type="file" wire:model="image" class="form-control">
				</div>
				</div>
               

                @isset($profiles)
				<h5 class="user-name"> {{$profiles->name}} </h5>
				<h6 class="user-email"> {{$profiles->emaill}} </h6>
				@endisset

				@empty($profiles)
				<h5 class="user-name"> Member Name </h5>
				<h6 class="user-email"> Member Email </h6>
				@endempty
			</div>
          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Total Pledges  </strong>{{$totpledge}} /=</span> </li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Given  </strong></span>{{$pledge}} /=</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Remaining</strong></span> {{$totpledge - $pledge}} </li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Status</strong></span> {{$pledgeperc}} % </li>
          </ul> 
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Personal Details</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">First Name</label>
					 <input wire:model="first_name" type="text" class="form-control" id="fullName" >
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Last Name</label>
					<input type="text" wire:model="last_name" class="form-control" id="fullName" >
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Email</label>
					<input type="email" wire:model="email" class="form-control" id="eMail" >
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Phone</label>
				<div class="input-group mb-3">
					
					  <div class="input-group-prepend"><span class="input-group-text"> +255 </span>
					  </div>
					<input type="tel" wire:model="phone_no" class="form-control" id="phone_no" placeholder="Enter phone number">
				</div>
			</div> 
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="dob">Date Of Birth</label>
					<input type="date" wire:model="dob" class="form-control" id="dob" placeholder="Website url">
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="gender">Gender</label>
                   <div class="form-check form-check-inline">
                    <input wire:model="sex" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="M">
                     <label class="form-check-label" for="inlineCheckbox1">Male</label>
                    </div>
                <div class="form-check form-check-inline">
                <input wire:model="sex" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="F">
                <label class="form-check-label" for="inlineCheckbox2">Female</label>
                </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-tgroup">
                    <select wire:model="status" class="form-select" aria-label="Default select example">
 					 <option selected>Marital Status</option>
 					 <option value="Single">Single</option>
 					 <option value="Married">Married</option>
 					 <option value="Divorced">Divorced</option>
					</select>
                </div>
            </div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">Address</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Street">Street</label>
					<input wire:model="street" type="name" class="form-control" id="Street" placeholder="Enter Street">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="ciTy">City</label>
					<input wire:model="city" type="name" class="form-control" id="ciTy" placeholder="EG. ">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Country">Country</label>
					<input wire:model="country" type="text" class="form-control" id="Country" placeholder="EG.  ">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="zIp">Jumuiya</label>
					<input wire:model="zip_code" type="text" class="form-control" id="zip_code" placeholder="EG. ">
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<button type="reset" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
					<button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
 <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
</form>
</div>

<!-- css style -->

<style type="text/css">
select {
    background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e);
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 18.0rem;
    height: 40px;
    -webkit-print-color-adjust: exact;
    color-adjust: exact;
}

.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}
.form-tgroup {
    margin-left: 409px;
    margin-bottom: 20px;
    margin-top: -55px;
}
</style>

<!-- end of profile style -->

</div>
