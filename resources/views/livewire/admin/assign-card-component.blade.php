<div>
	<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
   <div class="modal-content">
<div class="modal-header"> 
	<div class="text-center"> <span class="text-x2 text-gray-700">Assign Member Card</span> </div>
</div>
 <div class="card-body">
 	<form wire:submit.prevent="addCard">
 		<div>
	        @if (session()->has('message'))
	            <div class="alert alert-success">
	                {{ session('message') }}
	            </div>
	        @endif
	    </div>
    <table class="table" id="cardTable">
        <thead>
        <tr>
        	<th>Member</th>
        	<th>Card Number</th>
        	<th></th>
        </tr>
    </thead>
    <tbody>
    	<tr>
    		<td>
    			<select wire:model="user_id.[]" class="form-control">
                        <option value=""> Choose Member </option>
                        @foreach($members as $mem)
                        <option value=" {{$mem->idd}} "> {{$mem->name}} {{$mem->lastname}} </option>
                        @endforeach
                </select>
    		</td>
    		<td>
    			<input wire:model="card_no.[]" type="number" class="form-control" />
    		</td>
    		<td>

            	<button type="button" name="add" id="add-btn" class="btn btn-success test">Add </button>
        
    		</td>
    	</tr>
    </tbody>
     <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-sm btn-secondary"
                >Save Cards</button>
        </div>
    </div>
</table>
</form>
</div>
</div>
<script type="text/javascript">
	var i =0;
	$("#add-btn").click(function() {
		i++;
		$("#cardTable").append(
			'<tr><td><select wire:model="user_id.[]" class="form-control"><option value=""> Choose Member</option> @foreach($members as $mem)<option value=" {{$mem->idd}} "> {{$mem->name}} {{$mem->lastname}} </option>@endforeach</select></td><td><input wire:model="card_no.[]"type="number" class="form-control" /></td><td><button type="button" name="add" id="add-btn" class="btn btn-danger remove-tr test">Remove </button></td></tr>'
			);
		// body...
	});
	$(document).on('click', '.remove-tr', function(){
		$(this).parents('tr').remove();
	});
</script>

<style type="text/css">

		   .test {
    height: 38px;
}
	
</style>
</div>
