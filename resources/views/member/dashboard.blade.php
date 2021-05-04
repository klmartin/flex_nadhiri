@extends('layouts.index')

@section('center')


<div class="wrapper">
       <div class="row">
          <div class="col-md-12">
              <div class="card-header">
       
              </div>
            <div class="card">
                    <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> </span>
                       
                      <h5 class="description-header">{{$totpledge}}</h5>
                      
                      <span class="description-text">TOTAL PLEDGES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> </span>
                      
                      <h5 class="description-header"> {{$pledgegiv}} </h5>
                      
                      <span class="description-text">AMOUNT GIVEN</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                 
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> </span>
                    <h5 class="description-header"> {{$diff}}  </h5>
                     
                      <span class="description-text">AMOUNT REMAINING</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                      <h5 class="description-header"> {{$perc}} %</h5>
                      <span class="description-text">GOAL ACHIEVEMENT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
       
              </div>
              <!-- /.c
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>MY PLEDGES</strong>
                    </p>
       
                    <table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Amount</th>
      <th scope="col">Purpose</th>
      <th scope="col">Remaining</th>
      <th scope="col">Progress</th>
    </tr>
  </thead>
  <tbody>
       @foreach($pledge as $pledges)

    <tr>
      <th scope="row">{{\Carbon\Carbon::parse($pledges->created_at)->format('d M')}}</th>
      <td>{{$pledges->pamnt}}</td>
      <td>{{$pledges->pname}}</td>
      <td> {{$pledges->sumamnt}} {{$perc}} </td>@endforeach
      <td> 
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:{{$perc}}" ></div></div>
      </td>
  </tbody>
</table>

                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                 <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                  ADD NEW PLEDGE
                 </button>

                  <livewire:member.view-events-component/>
                  
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
    
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

     

      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-md">

         <livewire:member.add-pledge-component/>

        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- REQUIRED SCRIPTS -->
  </div> 

@endsection