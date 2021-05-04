<div>
    <div class="modal-content">
    	<div class="modal-header">
    		<h4 class="modal-title">Member Profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    	</div>
    	<div class="card-body">
    		<form wire:submit.prevent="saveProfile" enctype="multipart/form-data">
    			 @if(Session::has('message'))
              <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
              @endif
              <div class="form-group">
                   <label for="exampleInputPassword1">For Member</label>
                   <select wire:model="selectedUser" class="form-control">
                   <option>Choose Member Name </option>
                   @foreach($user as $users)
                       <option value=" {{$users->id}} "> {{$users->name}} {{$users->lastname}}  </option>
                   @endforeach
                   </select>
              </div>
            @if (!is_null($selectedUser))
              <div class="row">

              	<div class="col-md-6">
              		<div class="form-group">
                    <label for="exampleInputEmail1">Jumuiya</label>
                    <input wire:model="zip_code" type="text" class="form-control">
                    </div>

                  	<div class="form-group">
                    <label for="exampleInputEmail1">Marital Status</label>
                    <select wire:model="status" type="text" class="form-control">
                    	 <option selected>Marital Status</option>
                       <option value="Single">Single</option>
                       <option value="Married">Married</option>
                       <option value="Divorced">Divorced</option>
                    </select> 
                  	</div>

                  	<div class="form-group">
                    <label for="gender">Gender</label>
	                    <div class="form-check form-check-inline">
	                    <input wire:model="sex" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Male">
	                    <label class="form-check-label" for="inlineCheckbox1">Male</label>
	                    </div>
	                    <div class="form-check form-check-inline">
	                    <input wire:model="sex" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Female">
	                    <label class="form-check-label" for="inlineCheckbox2">Female</label>
	                    </div>
                    </div>

                    <div style="height: 35px;"></div>

                  	<div class="form-group">
                    <label for="exampleInputEmail1">Street</label>
                    <input wire:model="street" type="text" class="form-control">
                  	</div>
              	</div>

              	<div class="col-md-6">
              		<div class="form-group">
                    <label for="exampleInputEmail1">Member Image</label>
                    <input wire:model="image" type="file" class="form-control">
                  	</div>

                  	<div class="form-group">
                    <label for="exampleInputEmail1">Date Of Birth</label>
                    <input wire:model="dob" type="date" class="form-control">
                  	</div>

                  	<div class="form-group">
                    <label for="exampleInputEmail1">Country</label>
                    <input wire:model="country" type="text" class="form-control">
                  	</div>

                  	<div class="form-group">
                    <label for="exampleInputEmail1">City</label>
                    <input wire:model="city" type="text" class="form-control">
                  	</div>
              	</div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
            @endif
    		</form>
    	</div>
    </div>
</div>
