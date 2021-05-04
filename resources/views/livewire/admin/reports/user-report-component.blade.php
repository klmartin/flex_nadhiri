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


<div>

<!-- page custom styles -->


<div class="container">
    <div class="row">
        <div class="col-xl-12">
<div class="card">
    <div class="card-body">
        <h5 class="header-title pb-3 mt-0">Member Report {{\Carbon\Carbon::parse($today)->format('d M Y')}}
    	</h5>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr class="align-self-center">
                        <th>Full Name</th>
                        <th>Contacts</th>
                        <th>Address</th>
                        <th>Last Seen</th>
                        <th>Gender</th>
                        <th>Age</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                       <td> {{$user->name}} {{$user->lastname}} </td>
                        <td> <div style="white-space:pre;">{{$user->emaill}}</div><pre>{{$user->phone_no}}</pre> </td>

                        <td><div style="white-space:pre;"> {{$user->street}} </div><pre>{{$user->city}}</pre> <pre>{{$user->zip_code}}</pre> </td>
                        <td> {{\Carbon\Carbon::parse($user->last_seen)->diffForHumans()}} </td>
                        <td> {{$user->sex}} </td>                                  
                        <td> {{\Carbon\Carbon::parse($user->dob)->diff(\Carbon\Carbon::now())->format('%y years')}} </td>
                    </tr>
            	@endforeach
                </tbody>
            </table>
        </div>
        <!--end table-responsive-->
        <div class="pt-3 border-top text-right"><a href="#" class="text-primary"> Total Members {{$userCount}} <i class="mdi mdi-arrow-right"></i></a></div>
    </div>
</div>
        </div>
    </div>
</div>

</div>
