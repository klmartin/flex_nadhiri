<div>
   <div>

<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Payments Report on {{\Carbon\Carbon::parse($today)->format('d M Y')}} 
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
 
.card {
    border: none;
    -webkit-box-shadow: 1px 0 20px rgba(96,93,175,.05);
    box-shadow: 1px 0 20px rgba(96,93,175,.05);
    margin-bottom: 30px;
}
.table th {
    font-weight: 500;
    color: #827fc0;
}
.table thead {
    background-color: #f3f2f7;
}
.table>tbody>tr>td, .table>tfoot>tr>td, .table>thead>tr>td {
    padding: 14px 12px;
    vertical-align: middle;
}
.table tr td {
    color: #8887a9;
}
.thumb-sm {
    height: 32px;
    width: 32px;
}
.badge-soft-warning {
    background-color: rgba(248,201,85,.2);
    color: #f8c955;
}

.badge {
    font-weight: 500;
}
.badge-soft-primary {
    background-color: rgba(96,93,175,.2);
    color: #605daf;
}
.paymenttotal {
	position: absolute;
    color: #3731c5;
    margin-left: 550px;
    margin-top: 17px;
}
.movebtn{
	position: absolute;
	margin-left: 713px;
}
/*! CSS Used from: http://127.0.0.1:8000/css/adminlte.css */
*,*::before,*::after{box-sizing:border-box;}
body{margin:0;font-family:"Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";font-size:1rem;font-weight:400;line-height:1.5;color:#212529;text-align:left;background-color:#fff;}
h5{margin-top:0;margin-bottom:0.5rem;}
a{color:#007bff;text-decoration:none;background-color:transparent;}
a:hover{color:#0056b3;text-decoration:none;}
table{border-collapse:collapse;}
th{text-align:inherit;text-align:-webkit-match-parent;}
h5{margin-bottom:0.5rem;font-family:inherit;font-weight:500;line-height:1.2;color:inherit;}
h5{font-size:1.25rem;}
.container{width:100%;padding-right:7.5px;padding-left:7.5px;margin-right:auto;margin-left:auto;}
@media (min-width: 576px){
.container{max-width:540px;}
}
@media (min-width: 768px){
.container{max-width:720px;}
}
@media (min-width: 992px){
.container{max-width:960px;}
}
@media (min-width: 1200px){
.container{max-width:1140px;}
}
.row{display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-7.5px;margin-left:-7.5px;}
.col-xl-12{position:relative;width:100%;padding-right:7.5px;padding-left:7.5px;}
@media (min-width: 1200px){
.col-xl-12{-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%;}
}
.table{width:100%;margin-bottom:1rem;color:#212529;background-color:transparent;}
.table th{padding:0.75rem;vertical-align:top;border-top:1px solid #dee2e6;}
.table thead th{vertical-align:bottom;border-bottom:2px solid #dee2e6;}
.table-responsive{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;}
.btn{display:inline-block;font-weight:400;color:#212529;text-align:center;vertical-align:middle;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-color:transparent;border:1px solid transparent;padding:0.375rem 0.75rem;font-size:1rem;line-height:1.5;border-radius:18.25rem;transition:color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;}
@media (prefers-reduced-motion: reduce){
.btn{transition:none;}
}
.btn:hover{color:#212529;text-decoration:none;}
.btn:focus{outline:0;box-shadow:none;}
.btn:disabled{opacity:0.65;box-shadow:none;}
.btn-primary{color: #007bff;background-color: #f3f2f7;border-color: #abbbcc;box-shadow: none;}
.btn-primary:hover{color:#fff;background-color:#0069d9;border-color:#0062cc;}
.btn-primary:focus{color:#fff;background-color:#0069d9;border-color:#0062cc;box-shadow:0 0 0 0 rgba(38, 143, 255, 0.5);}
.btn-primary:disabled{color:#fff;background-color:#007bff;border-color:#007bff;}
.card{position:relative;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:0 solid rgba(0, 0, 0, 0.125);border-radius:0.25rem;}
.card-body{-ms-flex:1 1 auto;flex:1 1 auto;min-height:1px;padding:1.25rem;}
.border-top{border-top:1px solid #dee2e6!important;}
.align-self-center{-ms-flex-item-align:center!important;align-self:center!important;}
.mt-0{margin-top:0!important;}
.mb-0{margin-bottom:0!important;}
.pt-3{padding-top:1rem!important;}
.pb-3{padding-bottom:1rem!important;}
.text-right{text-align:right!important;}
.text-primary{color:#007bff!important;}
a.text-primary:hover,a.text-primary:focus{color:#0056b3!important;}
@media print{
*,*::before,*::after{text-shadow:none!important;box-shadow:none!important;}
a:not(.btn){text-decoration:underline;}
thead{display:table-header-group;}
tr{page-break-inside:avoid;}
body{min-width:992px!important;}
.container{min-width:992px!important;}
.table{border-collapse:collapse!important;}
.table th{background-color:#fff!important;}
}
body{min-height:100%;}
.card{box-shadow:0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);margin-bottom:1rem;}
.card-body::after{display:block;clear:both;content:"";}
.btn:disabled{cursor:not-allowed;}
.table:not(.table-dark){color:inherit;}
@media print{
.table-responsive{overflow:auto;}
.table-responsive > .table tr th{white-space:normal!important;}
}
/*! CSS Used from: Embedded */
.card{border:none;-webkit-box-shadow:1px 0 20px rgba(96,93,175,.05);box-shadow:1px 0 20px rgba(96,93,175,.05);margin-bottom:30px;}
.table th{font-weight:500;color:#827fc0;}
.table thead{background-color:#f3f2f7;}
</style>
</div>

</div>
