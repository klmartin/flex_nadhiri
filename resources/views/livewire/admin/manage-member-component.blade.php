<div>

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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
                <div> <button href="#myModal-5" data-toggle="modal" class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">New Member</button></div>
                <div> <button href="#myModal-4" data-toggle="modal" class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Assign Cards</button></div>
                <div> <button href="#myModal-3" data-toggle="modal" class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Member Details</button></div>
             
  
  <!-- Modal HTML -->
<div id="myModal-5" class="modal fade">
    <div class="modal-dialog modal-addpledgepayment">
    	
        <!-- livewire add member component -->

        <livewire:admin.add-member-component/>

        <!-- end of livewire add member Component -->

        </div>
    </div>

    <div id="myModal-4" class="modal fade">
    <div class="modal-dialog modal-addpledgepayment">
        
        <!-- livewire Assign Cards component -->

        <livewire:admin.assign-card-component/>

        <!-- end of livewire Assign Cards Component -->

        </div>
    </div>

    <div id="myModal-3" class="modal fade">
    <div class="modal-dialog modal-addpledgepayment">
        
        <!-- livewire Assign Cards component -->

        <livewire:admin.add-profile-component/>

        <!-- end of livewire Assign Cards Component -->

        </div>
    </div>
    

</div>
   <div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Members</h5>
                    <div style="position: absolute;margin-left: 950px;margin-top: -50px;">
                                            <label class="memberlabel">Period :</label>
                                            <select class="form-control" wire:model="period">
                                                <option value="default" selected="selected">All</option>
                                                <option value="monthly">Monthly</option>
                                                <option value="threemon">3 Months</option>
                                                <option value="sixmon">6 Months</option>
                                            </select>
                                        </div>
                    <div style="position: absolute;margin-left: 800px;margin-top: -50px;">
                     <label class="memberlabel">Rows :</label><div class="col-md-4"><input type="text"  placeholder="Rows" class="form-control input-md" wire:model="rows" />
                    </div></div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                               
                                <tr class="align-self-center">
                                    <th>Full Name</th>
                                    <th>Contacts</th>
                                    <th>Address</th>
                                    <th>Last Seen</th>
                                    <th>Action</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                   
                                    <td>@if($user->image)<img src="{{asset('assets/images/profiles')}}/{{$user->image}}" alt="" class="thumb-sm rounded-circle mr-2"> @else  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="thumb-sm rounded-circle mr-2"> @endif {{$user->name}} {{$user->lastname}}      
                                    </td>
                                    <td><div style="white-space:pree;">{{$user->emaill}}</div><pree>{{$user->phone_no}}</pree></td>
                                    <td><div style="white-space:pree;"> {{$user->street}} </div><pree>{{$user->city}}</pree> <pree>{{$user->zip_code}}</pree></td>                               
                                    <td>{{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>                            
                                    <td><a href="#myModal-6{{$user->idd}}" data-toggle="modal" class="btn btn-primary a-btn-slide-text <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                   <span class="iconify" data-icon="carbon:view" data-inline="false"></span>         
                                    </a><a wire:click.prevent="deleteMember({{$user->idd}})" class="btn btn-primary a-btn-slide-text <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    <span class="iconify" data-icon="fluent:delete-24-regular" data-inline="false"></span>         
                                    </a>  <div id="myModal-6{{$user->idd}}" class="modal fade">
                                    <div class="modal-dialog modal-lg">
                                        <div> <div class="modal-content">
                                <div class="container bootstrap snippets bootdey">
                                <div class="panel-body inf-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="{{asset('assets/images/profiles')}}/{{$user->image}}" data-original-title="Usuario"> 
                                          
                                        </div>
                                        <div class="col-md-6">
                                            <strong>More Member Info</strong><br>
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
                                                            {{$user->id}}     
                                                        </td>
                                                    </tr>
                                                    <tr>    
                                                        <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-user  text-primary"></span>    
                                                                Full Name                                                
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                           {{$user->name}} {{$user->lastname}}   
                                                        </td>
                                                    </tr>

                                                    <tr>        
                                                        <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                                                Phone Number                                                
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                            {{$user->emaill}} 
                                                        </td>

                                                    </tr>
                                                         <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                                                Address                                                
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                            {{$user->street}} {{$user->city}} {{$user->country}} 
                                                        </td>
                                                    </tr>

                                                    <tr>        
                                                        <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-eye-open text-primary"></span> 
                                                                Role                                                
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                           {{$user->role}}
                                                        </td>
                                                    </tr>
                                                    <tr>        
                                                        <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                                                Status & Gender                                                
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                           {{$user->status}} & {{$user->status}}
                                                        </td>
                                                    </tr>
                                                     <tr>        
                                                        <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                                                Date Of Birth                                                
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                           {{$user->dob}}
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
                                                            {{$user->created_at}}
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
                </div>
            </td>
        </tr>
                          
         @endforeach
                        </tbody>
                        </table>
                        {{$users->links()}}
                    </div>
                    <!--end table-responsive-->
                    <div class="pt-3 border-top text-right"><a href="#" class="text-primary">  <i class="mdi mdi-arrow-right"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .pree  {margin-top: 0;
    margin-bottom: 0rem;
    overflow: auto;display: block;
    font-size: 70.5%;
    color: #212529;}  
 
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
  .inf-content{
    border:1px solid #DDDDDD;
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    border-radius:10px;
    box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.3);
}
    .col-md-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 75%;
} 
    .memberlabel {
    position: absolute;
    margin-left:-65px;
    margin-top: 6px;
    }


.modal-dialogg {
    max-width: 600px;
    margin: 5.75rem auto;
}

</style>
<script type="text/javascript">
</script>
</div>
</div>
</div>

