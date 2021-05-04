<div>
             <div class="modal-content">
            <div class="modal-header">              
                <h4 class="modal-title">Add A New Member Payment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
             <div class="card-body">
                   <form wire:submit.prevent="storePayement" >
                     @if(Session::has('message'))
              <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
              @endif
                    <div class="row">
              <div class="col-md-6">
               
                  <div class="form-group">
                    <label for="exampleInputEmail1">Reference No</label>
                    <input wire:model="ref_no" type="text" class="form-control" placeholder="Refrence_no">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Amount Recieved</label>
                    <input wire:model="amount" type="text" class="form-control"  placeholder="Amount Recieved">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Recieved From</label>
                     <select wire:model="selectedCard" class="form-control">
                     <option>Choose Name and </option>
                      @foreach($name as $names)
                                <option value=" {{$names->id}} "> {{$names->name}} {{$names->lastname}}  </option>
                      @endforeach
                      </select>
                  </div>
                  @if (!is_null($selectedCard))
                   <div class="form-group">
                    <label for="exampleInputPassword1">Card No</label>
                     <select  wire:model="card_id" class="form-control">
                      @foreach($cards as $card)
                                <option value="{{ $card->id }}"> {{ $card->card_no }} </option>
                      @endforeach
                      </select>
                  </div>
                  @endif
              </div>
                   <div class="col-md-6 ">
                     <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Date</label>
                        <div class="col-sm-16">
                            <input wire:model="date" type="date" class="form-control" id="date" name="date">
                        </div>
                    </div>   
                     <div class="form-group">
                    <label for="exampleInputPassword1">Type</label>
                     <select wire:model="paytype" class="form-control">
                      <option> Choose Form Of Payment</option>
                      @foreach($paymethod as $paymethods)
                                <option value="{{$paymethods->id}}">{{$paymethods->pay_name}}</option>
                      @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Reason For</label>
                     <select wire:model="purpose_id" class="form-control">
                     <option>Choose Reason</option>
                      @foreach($viewName as $viewNames)
                                <option value="{{$viewNames->iddd}}">{{$viewNames->pname}}</option>
                      @endforeach
                      </select>
                  </div>
                  @if (!is_null($selectedCard))
                  <div class="form-group">
                    <label for="exampleInputPassword1">Pledge Amount Paid</label>
                     <select wire:model="pledge_id" class="form-control">
                     <option>Pledge Amount</option>
                     @foreach($pledg as $pledgs)
                                <option value=" {{$pledgs->id}} "> {{$pledgs->amount}} </option>
                     @endforeach
                      </select>
                  </div>
                  @endif
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
              </form>
                </div>
                <!-- /.form-group -->
              </div>
             
</div>
