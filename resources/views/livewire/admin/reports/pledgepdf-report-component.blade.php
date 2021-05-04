<div>
   <div>

<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Pedges Report {{\Carbon\Carbon::parse($today)->format('d M Y')}} 
                    <a href="{{ URL::to('/download-pdfB') }}" class="btn btn-primary a-btn-slide-text movebtn">Save As PDF</a>
                	</h5>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr class="align-self-center">
                                    <th>Member Name</th>
                                    <th>Member Contact</th>
                                    <th>Amount</th>
                                    <th>Total Paid</th>
                                    <th>Pledge Date</th>
                                    <th>Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                           	@foreach($pledges as $pledge)
                                <tr>
                                    <td> {{$pledge->name}} {{$pledge->lastname}} </td>
                                    <td> <div style="white-space:pree;">{{$pledge->emaill}}</div><pree>{{$pledge->phone_no}}</pree></td>
                                    <td> {{$pledge->amount}} </td>
                                    <td> {{$pledge->pamount}} </td>
                                    <td> {{\Carbon\Carbon::parse($pledge->crtat)->format('d M Y')}} </td>
                                    
                                    <td> {{$pledge->pamount/$pledge->amnt*100}} % </td>
                                </tr>
                        	@endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--end table-responsive-->
                 
                    <div class="pledgetotal"> Total Amount: {{$totalpledge}}</div>
                  
                    <div class="pt-3 border-top text-right"><a href="#" class="text-primary"> Total Results {{$pledgeCount}} <i class="mdi mdi-arrow-right"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- page custom styles -->
<style type="text/css">
    
th, td {
  border-bottom: 1px solid #ddd;
}
.table th {
    font-weight: 500;
    color: #827fc0;
}
tr:nth-child(even) {background-color: #f2f2f2;}

</style>
</div>

</div>
