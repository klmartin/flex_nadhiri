  <div>
            <div class="modal-content">
            <div class="modal-header">              
                <h4 class="modal-title">Add New Payment Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
             <div class="card-body">
            <form wire:submit.prevent="storePayType">
            	@if(Session::has('message'))
    			<div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
    			@endif
                    <div class="row">
              <div class="col-md-6">
               
                  <div class="form-group">
                    <label for="exampleInputEmail1">Payment Type Name</label>
                    <input wire:model="pay_name" type="text" class="form-control" placeholder="Payment Type">
                  </div>
              </div>
                    <div style="padding-top: 32px;padding-left: 15px;">
                      <button type="submit" class="btn btn-primary">Save</button></div>
                  </div>
              </div>
                     <div class="row">
              <div class="col-md-6">
             
                
                <!-- /.card-body -->

               
            </div>
           </div> 
             <div class="card-footer">
                 
                </div>
              </form>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Payment Type</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($payType as $typesh)
    <tr>
      <th scope="row">{{$typesh->id}}</th>
      <td>{{$typesh->pay_name}}</td>
      <td><button type="button" wire:click.prevent="deletePayType({{$typesh->id}})" class="btn btn-danger">Remove</button></td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$payType->links()}}
                </div>
                <!-- /.form-group -->
              </div>
</div>
