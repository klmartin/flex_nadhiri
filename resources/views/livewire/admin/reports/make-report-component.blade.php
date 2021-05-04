<div>
    <div>
     <div class="containerrr">
     	<div class="row">
     		<div class="col-md-4">
     			<div class="card">
     			<div class="card-header">
     				Generate Member Report
     			</div>
     			<form action=" {{route('memberReport')}} " method="POST">
     				@csrf
     				<div class="card-body">
     				<div class="form-group">
                    <label for="exampleInputPassword1">All Members Joined From</label>	
                    <input type="date" class="form-control" placeholder="Roll ID" name="fromdate">
                	</div>
                	<div class="form-group">
                    <label for="exampleInputPassword1">To </label>
                    <input type="date" class="form-control" placeholder="Roll ID" name="todate">
                	</div>
                	<div class="form-group">
                    <label for="exampleInputPassword1">Member Activity </label>
                    <select class="form-control" name="activity">
                    	<option value="All"> All </option>
                    	<option value="today"> Today </option>
                    	<option value="week"> This Week </option>
                    	<option value="month"> This Month </option>
                    	<option value="inactive"> Inactive </option>
                    </select>
                	</div>
                	</div>
                	<div class="card-footer">
                  	<button type="submit" name="action" value="view" class="btn btn-primary middle">View Report</button>
                    <button type="submit" name="action" value="pdf" class="btn btn-primary a-btn-slide-text movebtn">View PDF </button>
                	</div>
                </form>
     			</div>
     		</div>
     		<div class="col-md-4">
     			<div class="card">
	     		<div class="card-header">
	     		Generate Pledges Report
     			</div>
     			<form  action=" {{route('pledgeReport')}} " method="POST">
     				@csrf
     				<div class="card-body">
     				<div class="form-group">
                    <label for="exampleInputPassword1">All Pledges From</label>	
                    <input type="date" class="form-control" placeholder="Roll ID" name="fromdate">
                	</div>
                	<div class="form-group">
                    <label for="exampleInputPassword1">To </label>
                    <input type="date" class="form-control" placeholder="Roll ID" name="todate">
                	</div>
                    <label for="exampleInputPassword1"> Purposes </label>
                    <select class="form-control" name="activity">
                        <option value=""> All </option>
                        @foreach($purp as $purps)
                        <option value=" {{$purps->id}} "> {{$purps->pname}} </option>
                        @endforeach
                    </select>
                	</div>
                	<div class="card-footer">
                  	<button type="submit" name="action" value="view" class="btn btn-primary middle">View Report</button>
                    <button type="submit" name="action" value="pdf" class="btn btn-primary a-btn-slide-text movebtn">View PDF </button>
                	</div>
                </form>
     			</div>
     		</div>
     		<div class="col-md-4">
     			<div class="card">
     			<div class="card-header">
     			Generate Payments Reports
     			</div>
     			<form  action=" {{route('paymentReport')}} " method="POST">
     				@csrf
     				<div class="card-body">
     				<div class="form-group">
                    <label for="exampleInputPassword1">All Payments From</label>	
                    <input type="date" class="form-control" placeholder="Roll ID" name="fromdate">
                	</div>
                	<div class="form-group">
                    <label for="exampleInputPassword1">To </label>
                    <input type="date" class="form-control" placeholder="Roll ID" name="todate">
                	</div>
                     <label for="exampleInputPassword1"> Payment type </label>
                    <select class="form-control" name="activity">
                        <option value=""> All </option>
                        @foreach($payt as $payts)
                        <option value=" {{$payts->id}} "> {{$payts->pay_name}} </option>
                        @endforeach
                    </select>
                	</div>
                	<div class="card-footer">
                  	<button type="submit" name="action" value="view" class="btn btn-primary middle">View Report</button>
                    <button type="submit" name="action" value="pdf" class="btn btn-primary a-btn-slide-text movebtn">View PDF </button>
                	</div>
                </form>
     			</div>
     		</div>
     	</div>
     </div>
<style type="text/css">
	.middle 
	{
	    margin-left: 50px;
	}
	.containerrr
	{
		max-width: 1140px;
    	margin-top: 50px;
    	margin-left: 100px;
	}
    .btn-primary {
    color: var(--blue);
    background-color: #f4f6f9;
    border-color: #bbcee2;
    box-shadow: none;

}
.movebtn{
    position: absolute;
    margin-left: 12px;
}
</style>
</div>

</div>
