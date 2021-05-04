
<div>
   <div class="container mx-auto px-4 sm:px-8">
    @if(Session::has('message'))
                <div class "alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
        <div class="py-8">
            <div class="my-2 flex sm:flex-row flex-col">
              
                <div class="block relative">
                    <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                            </path>
                        </svg>
                    </span>
                    <input placeholder="Search" wire:model="searchTerm"
                        class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                </div>
                <div> <button href="#myModal-2" data-toggle="modal" class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Add Payment</button></div>
                 <div> <button href="#myModal-3" data-toggle="modal" class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Add Pledge</button></div>
                <div> <button href="#myModal-4" data-toggle="modal" class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Pledge Purposes</button></div>

  
  <!-- Modal HTML -->
<div id="myModal-2" class="modal fade">
    <div class="modal-dialog modal-addpledgepayment">
        <!-- livewire add payment component -->

        <livewire:admin.add-payement-component/>

        <!-- end of livewire add payment Component -->

        </div>
    </div>

    <div id="myModal-3" class="modal fade">
    <div class="modal-dialog modal-addpledgepayment">
        <!-- livewire add payment component -->

        <livewire:admin.add-pledge-component/>

        <!-- end of livewire add payment Component -->

        </div>
    </div>


    <div id="myModal-4" class="modal fade">
    <div class="modal-dialog modal-addpledgepayment">
        <!-- livewire add payment component -->

        <livewire:admin.manage-purposes-component/>

        <!-- end of livewire add payment Component -->
        </div>
    </div>

</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Pledges</h5>
                    <div style="position: absolute;margin-left: 875px;margin-top: -50px;">
                     <label class="memberlabel">Rows :</label><div class="col-md-4"><input type="text"  placeholder="Row" class="form-control input-md" wire:model="rows" />
                    </div></div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                               
                                <tr class="align-self-center">
                                    <th>Member Name</th>
                                    <th>Pledge Purpose</th>
                                    <th>Pledge Date</th>
                                    <th>Amount</th>
                                    <th>Progress</th>
                                    <th>Action</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                 @foreach($pledges as $pledge)
                                <tr>
                                    <td>
                                        @if($pledge->image)
                                        <img src="{{asset('assets/images/profiles')}}/{{$pledge->image}}" alt="" class="thumb-sm rounded-circle mr-2">
                                        @else
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="thumb-sm rounded-circle mr-2"> @endif
                                        {{$pledge->name}} </td>
                                    <td> {{$pledge->pname}} </td>
                                    <td> {{\Carbon\Carbon::parse($pledge->crtat)->format('d M')}} </td>
                                    <td>{{$pledge->amnt}}</td>
                                    <td><div class="progress"><div class="progress-bar" role="progressbar" style="width: {{$pledge->pamount/$pledge->amnt*100}}%;" aria-valuenow="{{$pledge->pamount/$pledge->amnt*100}}" aria-valuemin="0" aria-valuemax="100">{{$pledge->pamount/$pledge->amnt*100}}%</div></div></td>
                                    <td><a href="#pledge{{$pledge->idd}}" data-toggle="modal" class="btn btn-primary a-btn-slide-text <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                   <span class="iconify" data-icon="carbon:view" data-inline="false"></span></a>
                                   <a href="#" wire:click.prevent="deletePledge({{$pledge->idd}})" class="btn btn-primary a-btn-slide-text <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                     <span class="iconify" data-icon="fluent:delete-24-regular" data-inline="false"></span></a>  
                                    <div id="pledge{{$pledge->idd}}" class="modal fade">
                                    <div class="modal-dialog modal-lg">
                                        <div> <div class="modal-content">
                                <div class="container bootstrap snippets bootdey">
                                <div class="panel-body inf-content">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <strong>More Pledge Information</strong><br>
                                            <div class="table-responsive">
                                            <table class="table table-user-information">
                                                <tbody>
                                                    <tr>        
                                                        <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                                                Identification                                                
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                            {{$pledge->idd}}     
                                                        </td>
                                                    </tr>

                                                     <tr>        
                                                        <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                                                Member Name                                                
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                            {{$pledge->name}}     
                                                        </td>
                                                    </tr>

                                                    <tr>    
                                                        <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-user  text-primary"></span>    
                                                                Purpose                                                
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                           {{$pledge->pname}}  
                                                        </td>
                                                    </tr>

                                                       <tr>        
                                                        <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                                                Pledge Amount                                                
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                            {{$pledge->amnt}} 
                                                        </td>

                                                    </tr>

                                                    <tr>        
                                                        <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                                                Member Contacts                                                
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                            {{$pledge->phone_no}} {{$pledge->emaill}}
                                                        </td>

                                                    </tr>
                                                         <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                                                Amount Paid                                               
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                            {{$pledge->pamount}} 
                                                        </td>
                                                    </tr>

                                                    <tr>        
                                                        <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-eye-open text-primary"></span> 
                                                                Amount Remaining                                                
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                          {{$pledge->amnt-$pledge->pamount}}
                                                        </td>
                                                    </tr>
                                                    <tr>        
                                                        <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                                                Percentage Completetion                                               
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                           {{$pledge->pamount/$pledge->amnt*100}} %
                                                        </td>
                                                    </tr>
                                                    <tr>        
                                                        <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                                                Created At                                                
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                            {{$pledge->created_at}}
                                                        </td>
                                                    </tr>                                  
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>                                        
                                </div>
                                </div>
                    </div>
                </div></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--end table-responsive-->
                    <div class="pt-3 border-top text-right"><a href="#" class="text-primary"> {{ $pledges->links
                        () }} <i class="mdi mdi-arrow-right"></i></a></div>
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
a.btn:hover {
     -webkit-transform: scale(1.1);
     -moz-transform: scale(1.1);
     -o-transform: scale(1.1);
 }
 a.btn {
     -webkit-transform: scale(0.8);
     -moz-transform: scale(0.8);
     -o-transform: scale(0.8);
     -webkit-transition-duration: 0.5s;
     -moz-transition-duration: 0.5s;
     -o-transition-duration: 0.5s;
 }

    .memberlabel {
    position: absolute;
    margin-left:-65px;
    margin-top: 6px;
    } 
</style>
        </div>
    </div>
</body>
</html>
</div>
