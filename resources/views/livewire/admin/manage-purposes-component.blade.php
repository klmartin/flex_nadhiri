<div>
  <div>
             <div class="modal-content">
             <div class="modal-header">              
                <h4 class="modal-title">Add Pledge Purposes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
             <div class="card-body">
            <form wire:submit.prevent="storePurpose">
            	@if(Session::has('message'))
    			  <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
    			  @endif
              <div style="display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-425.5px;margin-left: 8.5px;">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Purpose Name</label>
                    <input wire:model="pname" type="text" class="form-control" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Purpose Ends By</label>
                    <input wire:model="expdate" type="date" class="form-control" placeholder="date">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Purpose Description</label>
                     <textarea wire:model="description" id="message" class="form-control" rows="9" cols="25" required="required" placeholder="Description"></textarea>
                  </div>
                   <button type="submit" class="btn btn-primary">Save</button>
              </div>
                   
                             
              </div>
                     
              <div class="col-md-6">
             
                
                <!-- /.card-body -->

               
            </div>
           
             <div class="card-footer">
                 
                </div>
              </form>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Purpose Name</th>
      <th scope="col">Description</th>
      <th>Expiry Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($purp as $purps)
    <tr>
      <th scope="row"> {{$purps->pname}} </th>
      <td> {{$purps->description}} </td>
      <td> {{$purps->expdate}} </td>
      <td><button type="button" wire:click.prevent="deletePurposes({{$purps->id}})" class="btn btn-danger"><span class="iconify" data-icon="fluent:delete-20-regular" data-inline="false"></span></button></td>
    </tr>
  @endforeach
  </tbody>
</table>

                </div>
                <!-- /.form-group -->
              </div>
</div>

</div>
