<div>
   <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Pledge</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form wire:submit.prevent="savePledge">
             	@if(Session::has('message'))
    			<div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
    			@endif
              @csrf
              <div class="form-group">
                   <label for="exampleInputPassword1">For Member</label>
                   <select wire:model="selectedUser" class="form-control">
                   <option>Choose Member Name </option>
                   @foreach($user as $users)
                       <option value="{{$users->id}}"> {{$users->name}} {{$users->lastname}}  </option>
                   @endforeach
                   </select>
              </div>
            @if (!is_null($selectedUser))
               <div class="row">
               <div class="col">
                 <input type="text" wire:model="amount" class="form-control" placeholder="Amount">
               </div>
              <div class="col">
              <select wire:model="purpose_id" class="form-control" aria-label="Default select example">
 				 <option selected>Select Purpose</option>
 				 @foreach($purp as $purps)
 				 <option value=" {{$purps->id}} ">{{$purps->pname}}</option>
 				 @endforeach
			  </select>
              </div>
              </div>
            @endif
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>

            </div>
          </form>
          </div>
          <!-- /.modal-content -->
</div>
