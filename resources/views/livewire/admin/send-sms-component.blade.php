<div>

     <div class="modal-content">
          <div class="modal-body">
           <form wire:submit.prevent="sendSms" class="form-horizontal">
			 	@if(Session::has('message'))
    			<div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
    			@endif
              	@csrf
                <div class="form-group">
                  <label class="col-sm-2" for="inputTo"><span class="glyphicon glyphicon-user"></span>Mobile Number</label>
                  <div class="col-sm-10"><input type="text" wire:model="mobile" class="form-control" id="mobile" placeholder="Enter Reciepents Phone Number "></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2" for="inputSubject"><span class="glyphicon glyphicon-list-alt"></span>Subject</label>
                  <div class="col-sm-10"><input type="text" class="form-control" id="inputSubject" placeholder="subject"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12" for="inputBody"><span class="glyphicon glyphicon-list"></span>Message</label>
                  <div class="col-sm-12"><textarea wire:model="message" class="form-control" id="inputBody" rows="8"></textarea></div>
                </div>
            
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button> 
            <!--<button type="button" class="btn btn-warning pull-left">Save Draft</button>-->
            <button type="submit" class="btn btn-primary ">Send <i class="fa fa-arrow-circle-right fa-lg"></i></button>
            </form>
            </div>
          </div>
        </div><!-- /.modal-content -->
        <style type="text/css">
        	@import url('http://fonts.googleapis.com/css?family=Open+Sans:200,300');
body {
  	
  	font-family: 'Open Sans',Arial,Helvetica,Sans-Serif;
}

.modal-header-info {
    color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #5bc0de;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}</style>
</div>


