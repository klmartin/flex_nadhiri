<div>
   <div>

<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Payments Report {{\Carbon\Carbon::parse($today)->format('d M Y')}} 
                    <a href="{{ URL::to('/download-pdfC') }}" class="btn btn-primary a-btn-slide-text movebtn"> Save As Pdf</a>
                	</h5>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr class="align-self-center">
                                    <th>Member Name</th>
                                    <th>Puporse Name</th>
                                    <th>Payment Type</th>
                                    <th>Amount</th>
                                    <th>Paid Date</th>
                                    <th>Ref</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td> {{$payment->name}} {{$payment->lastname}} </td>
                                    <td> {{$payment->pname}} </td>
                                    <td> {{$payment->pay_name}} </td>
                                    <td> {{$payment->amnt}} </td>
                                    <td> {{\Carbon\Carbon::parse($payment->date)->format('d M Y')}} </td>
                                    <td> {{$payment->ref_no}} </td>
                                </tr>
                        	@endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--end table-responsive-->
                    <div class="paymenttotal"> Total Payments: {{$paytotal}}</div>
                    <div class="pt-3 border-top text-right"><a href="#" class="text-primary"> Total Results: {{$paymentCount}} <i class="mdi mdi-arrow-right"></i></a></div>
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
